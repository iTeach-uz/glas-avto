<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OavImg */

$this->title = Yii::t('app', 'Create Oav Img');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oav Imgs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oav-img-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
