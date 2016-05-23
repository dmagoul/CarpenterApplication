<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EpiploSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="epiplo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'perigrafi') ?>

    <?= $form->field($model, 'id_eidos_epiploy') ?>

    <?= $form->field($model, 'id_typos_epiploy') ?>

    <?= $form->field($model, 'id_eidos_ksiloy') ?>

    <?php // echo $form->field($model, 'id_chroma') ?>

    <?php // echo $form->field($model, 'id_main_photo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
