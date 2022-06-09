<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Oynalar */

$this->title = Yii::t('app', 'Update Oynalar: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oynalars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Batafsil", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="oynalar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
