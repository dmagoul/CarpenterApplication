<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EidosEpiploy */

$this->title = 'Είδος Κατασκευής: Ενημέρωση ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Είδος Κατασκευής', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ενημέρωση';
?>
<div class="eidos-epiploy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
