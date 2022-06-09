<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Consumers */

$this->title = Yii::t('app', 'Create Consumers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Consumers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
