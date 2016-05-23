<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\XrwmaEpiploy */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Xrwma Epiploys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xrwma-epiploy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'perigrafi',
            'palette_code',
        ],
    ]) ?>

</div>
