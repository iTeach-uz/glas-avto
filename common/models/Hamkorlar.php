<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use Yii;

/**
 * This is the model class for table "hamkorlar".
 *
 * @property int $id
 * @property string $img
 * @property int $status
 */
class Hamkorlar extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    public static function tableName()
    {
        return 'hamkorlar';
    }

        
     
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/hamkorlar/{id}',
                'url' => '/frontend/web/upload/hamkorlar/{id}',
                'thumbs' => [
                    'preview' => ['width' => 278],
                ],
            ],
        ];
    }

    
    public function rules()
    {
        return [
            [['status', 'url'], 'integer'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['status'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['url'], 'string', 'max' => 255],
        ];
    }


    public function scenarios(){
        
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_UPDATE] = ['status'];

        return $scenarios;
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'url' => Yii::t('app', 'Url'),
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
