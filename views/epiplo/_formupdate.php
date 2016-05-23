<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\EidosEpiploy;
use app\models\TyposEpiploy;
use app\models\EidosKsiloy;
use app\models\XrwmaEpiploy;
use app\models\Fotografies;
use app\models\FotografiesSearch;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Epiplo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="epiplo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?php 
        $foto = new Fotografies();
        $foto = Fotografies::find()->where(['id' => $model->id_main_photo])->one();
    
    ?>
    <div class="row">
    <?php
        
            echo Html::img($main_photo->photo, ['class' => 'pull-left img-responsive', 'width' => '200']);
            
    ?>
    </div>
    
    <?= $form->field($main_photo, 'file')->fileInput() ?>
    
    <?= $form->field($main_photo, 'caption')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'perigrafi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_eidos_epiploy')->dropDownList(
            ArrayHelper::map(EidosEpiploy::find()->all(),'id','perigrafi'),
            ['prompt'=>'Επιλογή Είδους Κατασκευής'])?>

    <?= $form->field($model, 'id_typos_epiploy')->dropDownList(
            ArrayHelper::map(TyposEpiploy::find()->all(),'id','perigrafi'),
            ['prompt'=>'Επιλογή Τύπου Κατασκευής'])?>
    
    <?= $form->field($model, 'id_eidos_ksiloy')->dropDownList(
            ArrayHelper::map(EidosKsiloy::find()->all(),'id','perigrafi'),
            ['prompt'=>'Επιλογή Ξύλου Κατασκευής'])?>
    
    <?= $form->field($model, 'id_chroma')->dropDownList(
            ArrayHelper::map(XrwmaEpiploy::find()->all(),'id','perigrafi','palette_code'),
            ['prompt'=>'Επιλογή Χρώματος Κατασκευής'])?>
    
    <?= $form->field($main_photo, 'secondary_files[]')->fileInput(['multiple' => true]) ?>
    
   <!-- <?= $form->field($main_photo, 'secondary_files[]')->fileInput(['multiple' => true]) ?> -->
    
    <!-- Secondary FOTOGRAFIES for this EPIPLO -->
    <?php
    $searchModel = new FotografiesSearch();
    $searchModel->epiplo_id = $model->id;
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    //$dataProvider = FotografiesSearch::find()->where(['epiplo_id' => 'Null'])->all();
    //$searchModel2 = new FotografiesSearch();
    //$searchModel2 = FotografiesSearch::find()->where(['epiplo_id' => ])->all();
    ?>
    
     <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Ενημέρωση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
   <div class="fotografies-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    <h3>Λίστα από τις δευτερεύουσες φωτογραφίες της άνω κύριας κατασκευής</h3>
    </p>
    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
            'attribute' => 'photo',
            'format' => 'html',
            'label' => 'Φωτογραφία',
            'value' => function ($data) {
                return Html::img($data['photo'],
                    ['width' => '150px', 'height'=> '100px']
                        );
            },
            ],
            'caption',
            //'epiplo_id',
            [
             //'label'=>'blaaaaaaaa',
             'format' => 'raw',
             'value'=>function ($data) {
                        return Html::a('Προβολή', ['fotografies/view', 'id' => $data->id]);
                      },
             ],
                 
        ],
    ]); ?>
</div>

   
    <?php ActiveForm::end(); ?>

</div>
