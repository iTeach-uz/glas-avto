<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NomenImg */

$this->title = Yii::t('app', 'Create Nomen Img');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nomen Imgs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomen-img-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
