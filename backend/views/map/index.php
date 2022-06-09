<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\MapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Xarita');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="map-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'map',
                'value' => function($model){
                    return substr($model->map, 0, 100);
                },
            ],
            [
                'class' => ActionColumn::class,
                "template" => "{view}{update}",
                'contentOptions' => ['style' => 'font-size: 20px; width: 90px;']
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
