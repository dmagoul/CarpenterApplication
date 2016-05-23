<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TyposEpiploySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Typos Epiploys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typos-epiploy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Typos Epiploy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'perigrafi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
