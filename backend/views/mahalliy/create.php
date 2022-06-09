<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mahalliy */

$this->title = Yii::t('app', 'Create Mahalliy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mahalliys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahalliy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
