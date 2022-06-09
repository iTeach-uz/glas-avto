<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use mohorev\file\UploadBehavior;
use Yii;

/**
 * This is the model class for table "terim".
 *
 * @property int $id
 * @property string $img
 * @property string $file
 */
class Terim extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";


    public static function tableName()
    {
        return 'terim';
    }

    

        
    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::class,
                'attribute' => 'file',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/term_file/{id}',
                'url' => '/frontend/web/upload/term_file/{id}',
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/term/{id}',
                'url' => '/frontend/web/upload/term/{id}',
                'thumbs' => [
                    'preview' => ['width' => 482],
                ],
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }


             

    public function scenarios(){
        
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_UPDATE] = [];

        return $scenarios;
    }


    
    public function fields(){
        return [
            'id', 
            'img',
            'img' => function($model){
                return $model->getImageUrl();
            },
            'file' => function($model){
                return $model->getAsdUrl();
            },
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'file' => Yii::t('app', 'Fayl'),
        ];
    }


       

    public function getImageUrl(){

        return $this->getThumbUploadUrl('img', 'preview');
    }



    public function getAsdUrl(){

        return $this->getUploadUrl('file');
    }

}
