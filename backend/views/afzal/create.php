<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Afzal */

$this->title = Yii::t('app', 'Bizning Afzalliklar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bizning Afzalliklar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afzal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
