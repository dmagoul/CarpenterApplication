<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FotografiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fotografies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotografies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Φωτογραφίες: Εισαγωγή νέας', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            
            'caption',

            [
            'attribute' => 'photo',
            'format' => 'html',
            'label' => 'ImageColumnLable',
            'value' => function ($data) {
                return Html::img($data['photo'],
                    ['width' => '150px', 'height'=> '100px']
                        );
            },
            ],
            
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
