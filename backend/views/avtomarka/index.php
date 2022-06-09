<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView as GridGridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AvtomarkaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Avtomobil Markalari');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avtomarka-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model,$key,$index,$column) {
                    return GridGridView::ROW_COLLAPSED;
                },

                'detail' => function ($model,$key,$index,$column) {
                    // $items = $model->courseInfoes;
                    $itemsDataProvider = new \yii\data\ActiveDataProvider([
                        'query' => \common\models\AvtomarkaItem::find()
                            ->andWhere(['category_id' => $model->id])
                    ]);

                    return Yii::$app->controller->renderPartial('_items.php',[
                        'items' => $itemsDataProvider
                    ]);
                },

            ],
            'title',
            [
                'attribute' => 'asd',
                'label' => 'Avto Marka Rasm Qo\'shish',
                'value' =>function($model){
                    if($model->avtomarkaItems){
                        return "<a href='".Url::to(['avtomarka-item/create', 'id' => $model->id])."'><i class='fa fa-plus' title='Maxsulot qo`shish'></i></a>";
                    }
                    else{
                        return "<a href='".Url::to(['avtomarka-item/create', 'id' => $model->id])."'><i class='fa fa-minus' style='color:red'  title='Maxsulot mavhud emsa maxsulot qo`shish'></i></a>";
                    }
                },
                'contentOptions' => ['style' => 'font-size: 20px'],
                'format'=>'raw'
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return "<a class='btn btn-info btn-md' href='".Url::to(['avtomarka/change', 'id' => $model->id])."'>".$model->getStatusLabel()."</a>";
                },
                'format' => 'raw',
                'filter' => [
                    1 => 'Faol',
                    0 => 'Faol Emas',
                ],
            ],
            [
                'class' => ActionColumn::class,
                'contentOptions' => ['style' => 'font-size: 20px;'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
