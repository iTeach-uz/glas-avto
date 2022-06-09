<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Works */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bo\'sh Ish O\'rinlari'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="works-view" style="background: #fff; padding: 20px;">

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
            [
                'attribute' => 'file',
                'value' => function($model){
                    return '<a href="'.$model->getAsdUrl().'">'."File".'</a>';
                },
                'format' => 'raw',
            ],
            
            'title1',
            // 'title2',
            // 'title3',
            // 'content1',
            // 'content2',
            // 'content3',
        ],
    ]) ?>

</div>
