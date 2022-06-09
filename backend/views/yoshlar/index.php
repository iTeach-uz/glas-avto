<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\YoshlarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Yoshlar Ittifoqi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yoshlar-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // [
            //     'attribute' => 'file',
            //     'value' => function($model){
            //         return '<p>'.$model->getImageUrl().'</p>';
            //     },
            //     'format' => 'raw',
            // ],
            [
                'attribute' => 'title',
                'format' => 'raw',
            ],
            [
                'attribute' => 'content',
                'format' => 'raw',
            ],
            [
                'attribute' => 'url',
                'value' => function($model){
                    return Html::tag("p", "Fayl Urli",['width' => '80px']);
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::class,
                "template" => "{view}{update}",
                'contentOptions' => ['style' => 'width:150px; font-size:20px; width: 70px;'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
