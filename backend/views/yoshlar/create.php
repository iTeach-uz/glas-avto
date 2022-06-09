<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Yoshlar */

$this->title = Yii::t('app', 'Create Yoshlar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yoshlars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yoshlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
