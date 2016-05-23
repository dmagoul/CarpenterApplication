<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FotografiesEpiploy */

$this->title = 'Update Fotografies Epiploy: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fotografies Epiploys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fotografies-epiploy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
