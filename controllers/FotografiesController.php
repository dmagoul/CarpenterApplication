<?php

namespace app\controllers;

use Yii;
use app\models\Fotografies;
use app\models\FotografiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;


/**
 * FotografiesController implements the CRUD actions for Fotografies model.
 */
class FotografiesController extends Controller
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
     * Lists all Fotografies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FotografiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fotografies model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Fotografies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fotografies();

        if ($model->load(Yii::$app->request->post()) ) {
            
            $imageName = $model->caption;
            $model->file = UploadedFile::getInstance($model, 'file');
            //$model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension );
            $tm = time();
            $model->file->saveAs('uploads/'.$tm.'SecondaryPhotos_'.$model->id.'.'.$model->file->extension);
            $model->photo = 'uploads/'.$tm.'SecondaryPhotos_'.$model->id.'.'.$model->file->extension;
            
            $model->save();
            
            //$model = Fotografies::find()->where(['id' => $model->id])->one();
            //$tm = time();
            //@rename($model->photo,'uploads/'.$tm.'SecondaryPhotos_'.$model->id.'.jpg');
            //$model->photo = 'uploads/'.$tm.'SecondaryPhotos_'.$model->id.'.jpg';
            //$model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Fotografies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            if(UploadedFile::getInstance($model,'file'))
            {
                @unlink($model->photo);
                $model->file = UploadedFile::getInstance($model, 'file');
                $tm = time();
                $model->file->saveAs('uploads/'.$tm.'SecondaryPhotos_'.$model->id.'.jpg');
                $model->photo = 'uploads/'.$tm.'SecondaryPhotos_'.$model->id.'.jpg';
            }
            else {
                //@rename($oldpath,'uploads/'.$imageName.'.jpg');
                //$model->photo = 'uploads/'.$imageName.'.jpg';
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Fotografies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       
      $fullpath = $this->findModel($id)->photo;
      @unlink($fullpath);
      $ep_id = $this->findModel($id)->epiplo_id;
      $this->findModel($id)->delete();
        
     // return $this->redirect(Url::to(['epiplo/view', 'id' => 47]));
     return Yii::$app->response->redirect(Url::to(['epiplo/view', 'id' => $ep_id]));
      //Url::to(['path', 'id' => id])
    }

    /**
     * Finds the Fotografies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fotografies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fotografies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
