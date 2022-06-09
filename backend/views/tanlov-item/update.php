<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TanlovItem */

$this->title = Yii::t('app', 'Tanlov Maxsuloti', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tanlov Maxsuloti'), 'url' => ['tanlov/index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="tanlov-item-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
