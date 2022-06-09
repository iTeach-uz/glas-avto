<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sifat */

$this->title = Yii::t('app', 'Create Sifat');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sifats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sifat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
