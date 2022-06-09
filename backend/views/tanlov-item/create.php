<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TanlovItem */

$this->title = Yii::t('app', 'Tanlov Maxsuloti');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tanlov Maxsuloti'), 'url' => ['tanlov/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanlov-item-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
