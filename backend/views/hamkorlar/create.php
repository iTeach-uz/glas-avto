<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hamkorlar */

$this->title = Yii::t('app', 'Hamkorlar Qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hamkorlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hamkorlar-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
