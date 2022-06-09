<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AvtomarkaItem */

$this->title = Yii::t('app', 'Tahrirlash Avtomobil Rasmlari: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avtomobil Rasmlari'), 'url' => ['avtomarka/index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="avtomarka-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
