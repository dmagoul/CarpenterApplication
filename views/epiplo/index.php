<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EpiploSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Κατασκευές';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="epiplo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Κατασκευές: Δημιουργία νέας', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id_main_photo',
                'format' => ['image',['width'=>'100','height'=>'100']],
                //'value' => 'fotografiesFotografia.photo'
                'value' => 'fotografies.photo'
            ],
            'perigrafi',
            
            [
                'attribute' => 'id_eidos_epiploy',
                'value' => 'eidos_epiployEidos_epiploy.perigrafi'
            ],
            [
                'attribute' => 'id_typos_epiploy',
                'value' => 'typos_epiployTypos_epiploy.perigrafi'
            ],
            [
                'attribute' => 'id_eidos_ksiloy',
                'value' => 'eidos_ksiloyEidos_ksiloy.perigrafi'
            ],
            [
                'attribute' => 'id_chroma',
                'value' => 'xrwma_epiployXrwma_epiploy.perigrafi'
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
