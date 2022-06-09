<?php

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;


    $form = ActiveForm::begin();
    echo $form->field($model, 'username');
    echo $form->field($model, 'password')->input('password');
    echo $form->field($model, 'fullname');
    echo Html::submitButton('Admin qo\'shish', ['class' => 'btn btn-success btn-md']);

    ActiveForm::end();