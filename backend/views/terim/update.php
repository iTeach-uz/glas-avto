<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Terim */

$this->title = Yii::t('app', 'Tahrirlash', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shart'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>"Batafsil", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="terim-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
