<?php
namespace app\models;
use Yii;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Fotografies;
use app\models\Epiplo;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Epiplo */

$this->title = 'Προβολή κατασκευής με κωδικό: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Κατασκευές', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="epiplo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ενημέρωση', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Διαγραφή', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <div class="row">
    <?php
        
            //echo Html::img($main_photo->photo, ['class' => 'pull-left img-responsive', 'width' => '200']);
    ?>
    </div>
    <?php
    $foto = new Fotografies();
    $foto = Fotografies::find()->where(['id' => $model->id_main_photo])->one();
    $ft = $foto->photo;
    $eidos = new EidosEpiploy();
    $eidos = EidosEpiploy::find()->where(['id' => $model->id_eidos_epiploy])->one();
    $eid = $eidos->perigrafi;
    $typos = new TyposEpiploy();
    $typos = TyposEpiploy::find()->where(['id' => $model->id_typos_epiploy])->one();
    $typ = $typos->perigrafi;
    $ksilo = new EidosKsiloy();
    $ksilo = EidosKsiloy::find()->where(['id' => $model->id_eidos_ksiloy])->one();
    $ksil = $ksilo->perigrafi;
    $xroma = new XrwmaEpiploy();
    $xroma = XrwmaEpiploy::find()->where(['id' => $model->id_chroma])->one();
    $xrom = $xroma->perigrafi.' ('.$xroma->palette_code.')';
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
             'attribute'=>'id_main_photo',
            //'value'=>'uploads/MainPhotos_'.$model->id_main_photo.'.jpg',
            'value'=>$ft,
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            //'id',
            'perigrafi',
            [
            'attribute'=>'id_eidos_epiploy',
            'value'=>$eid,
            ],
            [
            'attribute'=>'id_typos_epiploy',
            'value'=>$typ,
            ],
            [
            'attribute'=>'id_eidos_ksiloy',
            'value'=>$ksil,
            ],
            [
            'attribute'=>'id_chroma',
            'value'=>$xrom,
            ],
       ],
    ]) ?>
    
</div>

<!-- Secondary FOTOGRAFIES for this EPIPLO -->
    <?php
    $searchModel = new FotografiesSearch();
    $searchModel->epiplo_id = $model->id;
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>
<!-- <hr style="height: 20px; border-style: solid; border-color: #1b6d85; border-width: 3px 0 0 0; border-radius: 20px;">  -->
<hr style="height: 1px; border-style: solid; border-color: #1b6d85; border-width: 3px 0 0 0;"> 
<h4><p class="text-primary"><strong>Δευτερεύουσες φωτογραφίες κύριας κατασκευής</strong></p></h4>
<hr style="height: 1px; border-style: solid; border-color: #1b6d85; border-width: 3px 0 0 0;"> 

   <div class="fotografies-index">
    
    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
            'attribute' => 'photo',
            'format' => 'html',
            'label' => 'Φωτογραφία',
            'value' => function ($data) {
                return Html::img($data['photo'],
                    ['width' => '150px', 'height'=> '100px']
                        );
            },
            ],
            'caption',
            //'epiplo_id',     
        ],
    ]); ?>
</div>

