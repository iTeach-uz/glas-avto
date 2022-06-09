<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Select */

$this->title = Yii::t('app', 'Create Select');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Selects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="select-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
