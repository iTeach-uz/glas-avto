<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OynalarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Avtomobil Oynalar ishlab chiqarish');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oynalar-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'format' => 'raw',
            ],
            [
                'attribute' => 'title',
                'value' => function($model){
                    return Html::a('<span class="fa fa-image"></span>', ['oynalar/add-imgs', 'id' =>$model->id], ['class' => 'btn btn-info btn-md']);
                },
                'format' => 'raw',
                'label' => 'Rasimlar',
            ],
            [
                'attribute' => 'text',
                'value' => function($model){
                    return Html::tag('p', substr($model->text, 0, 100)."...");
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update}',
                'contentOptions' => ['style' => 'font-size: 20px;'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
