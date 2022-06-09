<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tanlov */

$this->title = Yii::t('app', 'Create Tanlov');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tanlovs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanlov-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
