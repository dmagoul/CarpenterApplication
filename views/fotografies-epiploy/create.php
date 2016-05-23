<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FotografiesEpiploy */

$this->title = 'Create Fotografies Epiploy';
$this->params['breadcrumbs'][] = ['label' => 'Fotografies Epiploys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotografies-epiploy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
