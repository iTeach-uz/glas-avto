<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view" style="background: #fff; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'username',
            // 'auth_key',
            'password_hash',
            // 'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
            ],
            [
                'attribute' => 'updated_at',
                'label' => "Kiritilgan vaqt",
                'value' => function($model){
                    return date("d, M, Y", $model->updated_at);
                },
                'format' => 'raw',
            ],
            // 'verification_token',
            
        ],
    ]) ?>

</div>
