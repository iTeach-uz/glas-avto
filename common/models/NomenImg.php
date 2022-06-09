<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use Yii;

/**
 * This is the model class for table "nomen_img".
 *
 * @property int $id
 * @property string $img
 * @property int $status
 */
class NomenImg extends \yii\db\ActiveRecord
{

    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
   
    public static function tableName()
    {
        return 'nomen_img';
    }


       
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/nomen_imgs/{id}',
                'url' => '/frontend/web/upload/nomen_imgs/{id}',
                'thumbs' => [
                    'preview' => ['width' => 300],
                ],
            ],
        ];
    }



   
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'integer'],
            [['img'], 'file',"skipOnEmpty" =>true, 'extensions' => 'png, jpg'],
            [['img',], 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }


          

    // public function scenarios(){
        
    //     $scenarios = parent::scenarios();

    //     $scenarios[self::SCENARIO_UPDATE] = ['status'];

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

    
    public function fields(){
        return [
            'id',
            'img' => function($model){
                return $model->getImageUrl();
            }
        ];
    }
    
    public function getImageUrl(){

        return $this->getThumbUploadUrl('img', 'preview');
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
