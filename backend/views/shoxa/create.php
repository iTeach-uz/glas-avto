<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shoxa */

$this->title = Yii::t('app', 'Create Shoxa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shoxas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shoxa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
