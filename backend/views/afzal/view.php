<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Afzal */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bizning Afzalliklar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="afzal-view" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'icon',
            [
                'attribute' => 'title',
                'format' => 'raw'
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return "<a class='btn btn-info btn-md' href='".Url::to(['afzal/change', 'id' => $model->id])."'>".$model->getStatusLabel()."</a>";
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
