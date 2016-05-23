<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TyposEpiploy */

$this->title = 'Create Typos Epiploy';
$this->params['breadcrumbs'][] = ['label' => 'Typos Epiploys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typos-epiploy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
