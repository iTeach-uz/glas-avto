<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Navbar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="navbar-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <p>
        <?= $form->field($model, 'tel_namber')->textInput();?>
    </p>
    
    <p>
        <?= $form->field($model, 'status')->widget(\kartik\switchinput\SwitchInput::class, []); ?>
    </p>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
