<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VideogalareyaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Video Galareya');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videogalareya-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'img',
                'value' => function($model){
                    return Html::img($model->getImageUrl(),['width' => '80px']);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
            ],
            'url',
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update}',
                'contentOptions' => ['style' => 'font-size: 20px;'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
