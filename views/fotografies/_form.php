<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fotografies */
/* @var $form yii\widgets\ActiveForm */
?>

<div>
    <?= Html::a('Επιστροφή στην κύρια κατασκευή της δευτερεύουσας φωτογραφίας', ['epiplo/update', 'id' => $model->epiplo_id], ['class' => 'btn btn-success']) ?>       
</div>

<hr>

<div class="fotografies-form">
    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
   <div class="row">
        <?php echo "$model->photo";?>
    </div>
    <div class="row">
    <?php echo Html::img($model->photo, ['class' => 'pull-left img-responsive', 'width' => '250']);?>
    </div>
    <div class="row">
        <?= $form->field($model, 'file')->fileInput() ?>
    </div>
    <div class="row">
    <?= $form->field($model, 'caption')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Ενημέρωση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
