<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Uploadfile */

$this->title = Yii::t('app', 'Fayil yuklash');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Muvofiq'), 'url' => ['muvofiq/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uploadfile-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
