<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AvtomarkaItem */

$this->title = Yii::t('app', 'Avtomarka Rasmlari');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avtomobil Rasmlari'), 'url' => ['avtomarka/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avtomarka-item-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
