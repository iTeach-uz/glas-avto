<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Labaratorya */

$this->title = Yii::t('app', 'Create Labaratorya');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Labaratoryas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labaratorya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
