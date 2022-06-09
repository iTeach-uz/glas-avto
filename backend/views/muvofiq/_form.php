<?php

use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Muvofiq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muvofiq-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'title')->textInput();?><br><br>

    <?= $form->field($model, 'text')->widget(CKEditor::class,[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
