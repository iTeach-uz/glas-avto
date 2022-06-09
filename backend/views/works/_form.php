<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Works */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="works-form" style="background: #fff; padding: 20px;">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'img')->widget(\kartik\file\FileInput::class,[
        'pluginOptions' => [
            'initialPreview'=> Html::img($model->getImageUrl(), ['style' => 'width: 150px;']),
            'initialCaption'=>"The Moon and the Earth",
            'initialPreviewConfig' => [
                ['caption' => 'Moon.jpg', 'size' => '873727'],
                ['caption' => 'Earth.jpg', 'size' => '1287883'],
            ],
            'overwriteInitial'=>false,
            'maxFileSize'=>2800
        ]
    ]);?>

    
    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>


    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
