<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use Yii;

/**
 * This is the model class for table "navbar".
 *
 * @property int $id
 * @property string $img
 * @property string $tel_namber
 */
class Navbar extends \yii\db\ActiveRecord
{
    
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;


    public static function tableName()
    {
        return 'navbar';
    }

         
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/upload/navbar_img/{id}',
                'url' => '/upload/navbar_img/{id}',
                'thumbs' => [
                    'preview' => ['width' => 300, 'height' => 232],
                ],
            ],
        ];
    }


    public function fields(){

        return [
            'id',
            'tel_namber',
        ];

    }




    
    public function rules()
    {
        return [
            [['tel_namber', 'status'], 'required'],
            [['tel_namber'], 'string', 'max' => 255],
            [['status'], 'integer'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tel_namber' => Yii::t('app', 'Telefon Nomer'),
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
