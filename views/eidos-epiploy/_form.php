<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EidosEpiploy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eidos-epiploy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'perigrafi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Ενημέρωση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
