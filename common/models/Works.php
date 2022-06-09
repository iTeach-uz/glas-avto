<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use mohorev\file\UploadBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "works".
 *
 * @property int $id
 * @property string $file
 * @property string $img
 *
 * @property WorksLang[] $worksLangs
 */
class Works extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return 'works';
    }


        
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'languages' => [
                    'en' => 'English',
                    'uz' => 'Uzbek',
                    'ru' => 'Rus',
                ],
                'attributes' => [
                    'title1', 'title2', 'title3', 'content1', 'content2', 'content3'
                ]
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'file',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/rezyume_file/{id}',
                'url' => '/frontend/web/upload/rezyume_file/{id}',
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/works_img/{id}',
                'url' => '/frontend/web/upload/works_img/{id}',
                'thumbs' => [
                    'preview' => ['width' => 482],
                ],
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['title1', 'title2', 'title3', 'content1', 'content2', 'content3'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['title1', 'title2', 'title3', 'content1', 'content2', 'content3'], 'safe']
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
            'file' => Yii::t('app', 'File'),
            'img' => Yii::t('app', 'Rasm'),
            'title1' => Yii::t('app', 'Rezymeni yuklash'),
            'title2' => Yii::t('app', 'Rezymeni to\'ldirish'),
            'title3' => Yii::t('app', 'Rezymeni yuborish'),
            'content1' => Yii::t('app', 'Rezymeni haqida'),
            'content2' => Yii::t('app', 'Rezymeni shakli'),
            'content3' => Yii::t('app', 'Rezymeni emailga yuborish'),
        ];
    }

    

    public function getImageUrl(){

        return $this->getThumbUploadUrl('img', 'preview');
    }



    public function getAsdUrl(){

        return $this->getUploadUrl('file');
    }



    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }

}
