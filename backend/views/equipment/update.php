<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Equipment */

$this->title = Yii::t('app', 'Avtomobil Uskunalarini Ishlab Chiqarish   ', [
    // 'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avtomobil Uskunalarini Ishlab Chiqarish'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Batafsil", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="equipment-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
