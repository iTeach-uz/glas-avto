<?php

use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Tashkilot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tashkilot-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?><br>

    <div class="container">
        <div class="col-md-12">

            <?= $form->field($model, 'title')->textInput();?>

        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(CKEditor::class,[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ]);?>
        </div>
    </div>

    

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
