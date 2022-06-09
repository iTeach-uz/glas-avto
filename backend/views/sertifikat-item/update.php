<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SertifikatItem */

$this->title = Yii::t('app', 'Sertifikat Rasmi', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sertifikat Rasmi'), 'url' => ['sertifikat/index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="sertifikat-item-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
