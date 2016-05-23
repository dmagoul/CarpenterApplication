<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\XrwmaEpiploySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xrwma Epiploys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xrwma-epiploy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Xrwma Epiploy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'perigrafi',
            'palette_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
