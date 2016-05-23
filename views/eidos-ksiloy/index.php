<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EidosKsiloySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eidos Ksiloys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eidos-ksiloy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Eidos Ksiloy', ['create'], ['class' => 'btn btn-success']) ?>
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
