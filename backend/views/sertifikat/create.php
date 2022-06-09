<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sertifikat */

$this->title = Yii::t('app', 'Sertifikat Kategoriyalari');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sertifikat Kategoriyalari'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertifikat-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
