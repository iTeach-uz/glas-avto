<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Consumers */

$this->title = Yii::t('app', 'Xalq iste\'mol mollari', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Xalq iste\'mol mollari'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Batafsil", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="consumers-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
