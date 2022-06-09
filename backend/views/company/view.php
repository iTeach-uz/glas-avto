<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = $model->title." Batafsil";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kompanya Haqida'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-view" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'img',
                'value' => function($model){
                    return Html::img($model->getImageUrl(),['width' => '130px']);
                },
                'format' => 'raw',
            ],
            'title',
            [
                'attribute' => 'text',
                'format' => 'raw'
            ],
            'block_title1',
            'block_title2',
            'block_title3',
            'number1',
            'number2',
            'number3',
        ],
    ]) ?>

</div>
