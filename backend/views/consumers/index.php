<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ConsumersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Xalq iste\'mol mollari');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumers-index" style="background: #fff; padding: 20px;">
    <h2 class="text-right">
        <a href="<?=Url::to(['product-category/index']);?>" class="text-right btn btn-success">
            <span>Maxsultlar</span> <i class="fa-solid fa-plus"></i>
        </a>
    </h2>
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
