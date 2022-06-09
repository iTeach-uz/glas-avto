<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fotogalareya */

$this->title = Yii::t('app', 'Foto Galareya', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Foto Galareya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Batafsil", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="fotogalareya-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
