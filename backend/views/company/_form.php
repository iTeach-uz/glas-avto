<?php

use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->widget(\kartik\file\FileInput::class,[
        'pluginOptions' => [
            'initialPreview'=> Html::img($model->getImageUrl(),['style' => 'width: 150px;']),
            'initialCaption'=>"The Moon and the Earth",
            'initialPreviewConfig' => [
                ['caption' => 'Moon.jpg', 'size' => '873727'],
                ['caption' => 'Earth.jpg', 'size' => '1287883'],
            ],
            'overwriteInitial'=>false,
            'maxFileSize'=>2800
        ]
    ]);?>
    <br><br>
    
    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::class,[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);?>
    <?= $form->field($model, 'number1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'block_title1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'block_title2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number3')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'block_title3')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
