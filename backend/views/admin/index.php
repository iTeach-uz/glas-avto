<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Admin');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>
    <!-- <p>
        <?= Html::a(Yii::t('app', 'Create Admin'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username',
            'password',
            'fullname',
            [
                'class' => ActionColumn::class,
                "template" => "{view}{update}{delete}",
                'contentOptions' => ['style' => 'font-size: 20px;']
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
