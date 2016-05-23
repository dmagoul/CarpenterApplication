<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fotografies */

$this->title = 'Ενημέρωση φωτογραφίας με κωδικό: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Φωτογραφίες', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ενημέρωση';
?>
<div class="fotografies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
