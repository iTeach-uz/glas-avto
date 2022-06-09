<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView as GridGridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\MuvofiqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Muvofiqlik');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muvofiq-index" style="background: #fff; padding: 20px;">

<h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>

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
                            'query' => \common\models\Uploadfile::find()
                                ->andWhere(['muvofiq_id' => $model->id])
                        ]);
    
                        return Yii::$app->controller->renderPartial('_items.php',[
                            'items' => $itemsDataProvider
                        ]);
                    },
    
                ],
                [
                    'attribute' => 'title',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'asd',
                    'label' => 'Fayl Qo\'shish',
                    'value' =>function($model){
                        if($model->uploadfile){
                            return "<a href='".Url::to(['uploadfile/create', 'id' => $model->id])."'><i class='fa fa-plus' title='Maxsulot qo`shish'></i></a>";
                        }
                        else{
                            return "<a href='".Url::to(['uploadfile/create', 'id' => $model->id])."'><i class='fa fa-minus' style='color:red'  title='Maxsulot mavhud emsa maxsulot qo`shish'></i></a>";
                        }
                    },
                    'contentOptions' => ['style' => 'font-size: 20px'],
                    'format'=>'raw'
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
