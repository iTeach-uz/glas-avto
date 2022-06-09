<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SertifikatItem */

$this->title = Yii::t('app', 'Sertifikat Rasmi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sertifikat Rasmi'), 'url' => ['sertifikat/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertifikat-item-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
