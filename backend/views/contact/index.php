<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contact');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'email:email',
            [
                'attribute' => 'tel',
            ],
            'created_at:date',
            'updated_at:date',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    if($data->status == 0){
                        return Html::a( "O'qildi", Url::to(['contact/view', 'id' => $data->id]), ['class' => "btn btn-info btn-sm"]);
                    }
                    else{
                        return Html::a("O'qilmadi", Url::to(['contact/view', 'id' => $data->id]), ['class' => "btn btn-danger btn-sm"]);
                    }
                },
                'filter' => [
                    '1' => "O'qilmadi",
                    '0' => "O'qildi",
                ]
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{view} {delete}',
                'contentOptions' => ['style' => 'font-size: 20px; width: 90px;'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
