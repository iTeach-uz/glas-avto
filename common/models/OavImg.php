<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use Yii;

/**
 * This is the model class for table "oav_img".
 *
 * @property int $id
 * @property string $img
 */
class OavImg extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    public static function tableName()
    {
        return 'oav_img';
    }

    
         
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/oav_img/{id}',
                'url' => '/frontend/web/upload/oav_img/{id}',
                'thumbs' => [
                    'preview' => ['width' => 300],
                ],
            ],
        ];
    }



    public function rules()
    {
        return [
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg',],
        ];
    }


    
    public function scenarios(){
        
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_UPDATE] = [];

        return $scenarios;
    }


    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
        ];
    }

    
    public function fields(){

        return [
            'id',
            'img' => function($model){
                return $model->getImageUrl();
            },
        ];
    }


    
    public function getImageUrl(){

        return $this->getUploadUrl('img');
    }


}
