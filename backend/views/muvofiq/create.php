<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Muvofiq */

$this->title = Yii::t('app', 'Create Muvofiq');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Muvofiqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muvofiq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
