<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EidosKsiloy */

$this->title = 'Create Eidos Ksiloy';
$this->params['breadcrumbs'][] = ['label' => 'Eidos Ksiloys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eidos-ksiloy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
