<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

// $this->title = Yii::t('app', 'Maxsulotlar');
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index" style="background: #fff; padding: 20px;">

<h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $items,
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
                'attribute' => 'status',
                'value' => function($model){
                    return "<a class='btn btn-info btn-md' href='".Url::to(['avtomarka-item/change', 'id' => $model->id])."'>".$model->getStatusLabel()."</a>";
                },
                'format' => 'raw',
                'filter' => [
                    1 => 'Faol',
                    0 => 'Faol Emas',
                ],
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style' => 'width:150px; font-size:20px'],
                'buttons' => [
                    'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['avtomarka-item/delete', 'id' =>$model->id], [
                            // 'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'O\'chirish',
                                'method' => 'post'
                            ]
                        ]);
                    },
                    'view' => function($url, $model){
                        return Html::a('<span class="fa fa-eye"></span>', ['avtomarka-item/view', 'id' =>$model->id]);
                    },

                    'update' => function($url, $model){
                        return Html::a('<span class="fa fa-edit"></span>', ['avtomarka-item/update', 'id' =>$model->id],);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>