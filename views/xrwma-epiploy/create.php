<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\XrwmaEpiploy */

$this->title = 'Create Xrwma Epiploy';
$this->params['breadcrumbs'][] = ['label' => 'Xrwma Epiploys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xrwma-epiploy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
