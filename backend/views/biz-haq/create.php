<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BizHaq */

$this->title = Yii::t('app', 'Create Biz Haq');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Biz Haqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biz-haq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
