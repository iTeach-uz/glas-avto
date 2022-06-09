<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sotish */

$this->title = Yii::t('app', 'Create Sotish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sotishes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sotish-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
