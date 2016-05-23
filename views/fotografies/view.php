<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Fotografies */

$this->title = $model->photo;
$this->params['breadcrumbs'][] = ['label' => 'Φωτογραφίες', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotografies-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ενημέρωση δευτερεύουσας φωτογραφίας', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Διαγραφή δευτερεύουσας φωτογραφίας', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Επιστροφή στην κύρια κατασκευή της δευτερεύουσας φωτογραφίας', ['epiplo/update', 'id' => $model->epiplo_id], ['class' => 'btn btn-success']) ?>
       
    </p>
    <?php
    
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
             'attribute'=>'photo',
            //'value'=>'uploads/MainPhotos_'.$model->id_main_photo.'.jpg',
            //'value'=>$ft,
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'caption',
        ],
    ]) ?>

</div>
