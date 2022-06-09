<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Navbar */

$this->title = Yii::t('app', 'Create Navbar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Navbars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navbar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
