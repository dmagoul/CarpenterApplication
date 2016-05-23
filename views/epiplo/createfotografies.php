<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Epiplo */

$this->title = 'Δημιουργία νέας κατασκευήςxxxxxxxxx';
$this->params['breadcrumbs'][] = ['label' => 'Κατασκευές', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotografies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'main_photo' => $main_photo,
    ]) ?>

</div>
