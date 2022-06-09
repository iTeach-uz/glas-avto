<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Oav */

$this->title = Yii::t('app', 'Create Oav');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oavs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oav-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
