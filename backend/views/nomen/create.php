<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Nomen */

$this->title = Yii::t('app', 'Nomenklatura');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nomenklatura'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomen-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
