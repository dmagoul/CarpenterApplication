<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fotografies */

$this->title = 'Create Fotografies';
$this->params['breadcrumbs'][] = ['label' => 'Fotografies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotografies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
