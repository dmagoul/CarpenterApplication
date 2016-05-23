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
    
</div>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Ενημέρωση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
