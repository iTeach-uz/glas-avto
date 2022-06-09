<?php

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;


    $form = ActiveForm::begin();
    echo $form->field($model, 'item_name')->dropDownList(
        \yii\helpers\ArrayHelper::map($auth, 'name', 'name'),
        [
            'prompt' => "Qoida Biriktirish",
        ]
    );
    echo $form->field($model, 'user_id')->textInput(['value' => $admin->id, 
        'readonly' => true,
    ]);
    echo $form->field($model, 'created_at');
    echo Html::submitButton('Admin qo\'shish', ['class' => 'btn btn-success btn-md']);

    ActiveForm::end();