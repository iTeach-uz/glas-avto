<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Muvofiq */

$this->title = Yii::t('app', 'Muvofiqlik', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Muvofiqlik'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Batafsil", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="muvofiq-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
