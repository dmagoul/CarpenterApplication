<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FotografiesEpiploySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fotografies Epiploys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotografies-epiploy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fotografies Epiploy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_epiploy',
            'id_fotografias',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
