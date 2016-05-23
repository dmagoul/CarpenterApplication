<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EidosEpiploy */

$this->title = 'Είδος Κατασκευής: Δημιουργία';
$this->params['breadcrumbs'][] = ['label' => 'Είδος Κατασκευής', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eidos-epiploy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
