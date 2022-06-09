<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Terim */

$this->title = Yii::t('app', 'Create Terim');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Terims'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
