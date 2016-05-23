<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FotografiesEpiploy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fotografies-epiploy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_epiploy')->textInput() ?>

    <?= $form->field($model, 'id_fotografias')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
