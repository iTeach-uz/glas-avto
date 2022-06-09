<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Administrator');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index" style="background: #fff; padding: 20px;">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Create Tanlov Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'username',
                'value' => function($model){
                    return "<h3>".$model->username."</h3>";
                },
                'format' => 'raw',
            ],
            'password_hash',
            // 'status',
            // 'created_at:date',
            'updated_at:date',
            
            [
                'class' => ActionColumn::class,
                'template' => "{view}{update}",
                'contentOptions' => ['style' => 'font-size: 20px;'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
