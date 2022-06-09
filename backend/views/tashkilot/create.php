<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tashkilot */

$this->title = Yii::t('app', 'Create Tashkilot');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tashkilots'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tashkilot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
