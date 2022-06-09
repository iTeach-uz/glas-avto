<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rahbaryat */

$this->title = Yii::t('app', 'Rahbaryat Qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rahbaryat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rahbaryat-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
