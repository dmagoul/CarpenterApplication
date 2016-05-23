<?php

namespace app\controllers;

use Yii;
use app\models\Epiplo;
use app\models\EpiploSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Fotografies;
use app\models\FotografiesEpiploy;

/**
 * EpiploController implements the CRUD actions for Epiplo model.
 */
class EpiploController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Epiplo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EpiploSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Epiplo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $main_photo = new Fotografies();
        $main_photo = Fotografies::find()->where(['id' => $model->id_main_photo])->one();
        
        return $this->render('view', [
            'model' => $model,
            'main_photo' => $main_photo,
        ]);
    }

    /**
     * Creates a new Epiplo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Epiplo();
        $main_photo = new Fotografies();
        
        if ($model->load(Yii::$app->request->post()) && $main_photo->load(Yii::$app->request->post()) ) {
            
            $main_photo->file = UploadedFile::getInstance($main_photo, 'file');
            $main_photo->file->saveAs('uploads/'.$main_photo->file->getBaseName().'.'.$main_photo->file->getExtension());
            $main_photo->photo = 'uploads/'.$main_photo->file->getBaseName().'.'.$main_photo->file->getExtension();
            $main_photo->epiplo_id = $model->id;
            $main_photo->save();
            
            $model->id_main_photo = $main_photo->id;
            $model->save();
            
            //$main_photo = new Fotografies();
            $main_photo = Fotografies::find()->where(['id' => $model->id_main_photo])->one();
            $tm = time();
            @rename($main_photo->photo,'uploads/'.$tm.'MainPhotos_'.$main_photo->id.'.jpg');
            $main_photo->photo = 'uploads/'.$tm.'MainPhotos_'.$main_photo->id.'.jpg';
            $main_photo->save();
            
            $main_photo->secondary_files = UploadedFile::getInstances($main_photo,'secondary_files');
            foreach ($main_photo->secondary_files as $imfile) {
                $imfile->saveAs('uploads/' . $imfile->getBaseName() . '.jpg');
                $sec_photo = new Fotografies();
                $sec_photo->photo = 'uploads/'.$imfile->getBaseName().'.'.$imfile->getExtension();
                $sec_photo->caption = $main_photo->caption;
                $sec_photo->epiplo_id = $model->id;
                $sec_photo->save();
            }
            $photo = new Fotografies();
            $photo = Fotografies::find()->where(['epiplo_id' => $model->id])->all();
            foreach ($photo as $pht) {
                $tm = time();
                @rename($pht->photo,'uploads/'.$tm.'SecondaryPhotos_'.$pht->id.'.jpg');
                $pht->photo = 'uploads/'.$tm.'SecondaryPhotos_'.$pht->id.'.jpg';
                $pht->save();
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model, 
                'main_photo' => $main_photo,
                //'second_photos' => $second_photos,
            ]);
        }
    }

    /**
     * Updates an existing Epiplo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $main_photo = Fotografies::find()->where(['id' => $model->id_main_photo])->one();
        
        if ($model->load(Yii::$app->request->post()) && $main_photo->load(Yii::$app->request->post()) ) {
           
            //Management of the main_photo 
            if (UploadedFile::getInstance($main_photo,'file')) {
               
                $main_photo->file = UploadedFile::getInstance($main_photo, 'file');
                @unlink($main_photo->photo);
                $tm = time();
                $main_photo->file->saveAs('uploads/'.$tm.'MainPhotos_'.$main_photo->id.'.jpg');
                $main_photo->photo = 'uploads/'.$tm.'MainPhotos_'.$main_photo->id.'.jpg';
            }
            $main_photo->save();
            
            $model->save();
            
            $main_photo->secondary_files = UploadedFile::getInstances($main_photo,'secondary_files');
            foreach ($main_photo->secondary_files as $imfile) {
                $imfile->saveAs('uploads/' . $imfile->getBaseName() . '.jpg');
                $sec_photo = new Fotografies();
                $sec_photo->photo = 'uploads/'.$imfile->getBaseName().'.'.$imfile->getExtension();
                $sec_photo->caption = $main_photo->caption;
                $sec_photo->epiplo_id = $model->id;
                $sec_photo->save();
            }
            //Management of the secondary_photos
            $secondary_photos = new Fotografies();
            $secondary_photos = Fotografies::find()->where(['epiplo_id' => $model->id])->all();
            foreach ($secondary_photos as $pht) {
                $tm = time();
                @rename($pht->photo,'uploads/'.$tm.'SecondaryPhotos_'.$pht->id.'.jpg');
                $sec_photo = Fotografies::find()->where(['id' => $pht->id])->one();
                $sec_photo->photo = 'uploads/'.$tm.'SecondaryPhotos_'.$pht->id.'.jpg';
                $sec_photo->caption = $pht->caption;
                $sec_photo->epiplo_id = $pht->epiplo_id;
                $sec_photo->save();
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
            
        } else {
            return $this->render('update', [
                'model' => $model, 
                'main_photo' => $main_photo,
            ]);
        }
    }

    /**
     * Deletes an existing Epiplo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $main_photo = new Fotografies();
        
        $main_photo = Fotografies::find()->where(['id' => $model->id_main_photo])->one();
        if ($main_photo) {
            @unlink($main_photo->photo);
            $main_photo->delete();
        }
         
        $main_photo = Fotografies::find()->where(['epiplo_id' => $model->id])->all();
        
        foreach ($main_photo as $imfile) {
            @unlink($imfile->photo);
            $imfile->delete();
        }
       
        $this->findModel($id)->delete();
       
        return $this->redirect(['index']);
    }

    /**
     * Finds the Epiplo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Epiplo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Epiplo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        
        
    }
    
    
    //public function givePhoto($id)
    //{
    //    $model = $this->findModel($id);
    //    $main_photo = new Fotografies();
    //    $main_photo = Fotografies::find()->where(['epiplo_id' => $model->id_main_photo])->one();
    //    return $main_photo->photo;
   // }
    
    
}


