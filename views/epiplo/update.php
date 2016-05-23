<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Epiplo */

$this->title = 'Ενημέρωση κατασκευής με κωδικό: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Κατασκευές', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Προβολή κατασκευής με κωδικό: '.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ενημέρωση';
?>
<div class="epiplo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupdate', [
        'model' => $model,
        'main_photo' => $main_photo
    ]) ?>

</div>
