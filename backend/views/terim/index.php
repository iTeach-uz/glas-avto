<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TerimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contact Rasmi va Shartlari');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terim-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Create Terim'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'img',
                'value' => function($model){
                    return Html::img($model->getImageUrl(),['width' => '120px']);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'file',
            ],
            [
                'class' => ActionColumn::class,
                "template" => "{view}{update}",
                'contentOptions' => ['style' => 'width:70px; font-size:20px'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
