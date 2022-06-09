<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mahalliy */

$this->title = Yii::t('app', 'Mahalliylashtirish', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mahalliylashtirish'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Batafsil", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahririlash');
?>
<div class="mahalliy-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
