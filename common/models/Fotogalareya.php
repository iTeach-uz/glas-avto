<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use Yii;

/**
 * This is the model class for table "fotogalareya".
 *
 * @property int $id
 * @property string $img
 * @property int|null $status
 */
class Fotogalareya extends \yii\db\ActiveRecord
{
    
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_CREATE = 'create';
     
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    public static function tableName()
    {
        return 'fotogalareya';
    }
      
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default','create'],
                'path' => '@frontend/web/upload/foto_img/{id}',
                'url' => '/frontend/web/upload/foto_img/{id}',
                'thumbs' => [
                    'preview' => ['width' => 277],
                ],
            ],
        ];
    }



    
    public function rules()
    {
        return [
    
            [['status'], 'integer'],
            [['img'], 'file', 'skipOnEmpty' => true, 'maxSize' => 4*(1024*1024), 'extensions' => 'png, jpg'],
            [['img',], 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }


    // public function scenarios()
    // {
    //     $scenarios = parent::scenarios();
    //     $scenarios[self::SCENARIO_UPDATE] = ['status'];
    //     $scenarios[self::SCENARIO_CREATE] = ['img'];
    
    //     return $scenarios;
    // }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'status' => Yii::t('app', 'Status'),
        ];
    }


    
    
    public function getImageUrl(){

        return $this->getUploadUrl('img');
    }

        
    
    public static function statuses(){
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Faol'),
            self::STATUS_NO_ACTIVE => Yii::t('app', 'Faol Emas'),
        ];
    }


    public function getStatusLabel(){
        return $this->statuses() [$this->status];
    }

}
