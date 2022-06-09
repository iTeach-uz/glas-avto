<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "biz_haq".
 *
 * @property int $id
 * @property string $img
 *
 * @property BizHaqLang[] $bizHaqLangs
 */
class BizHaq extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";

    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return 'biz_haq';
    }

         
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'languages' => [
                    'uz' => 'Uzbek',
                    'en' => 'English',
                    'ru' => 'Rus',
                ],
                'attributes' => [
                    'title', 'top_title', 'text'
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/biz_haq/{id}',
                'url' => '/frontend/web/upload/biz_haq/{id}',
                'thumbs' => [
                    'preview' => ['width' => 482],
                ],
            ],
        ];
    }



    
    public function rules()
    {
        return [
            [['title', 'top_title'], 'string', 'max' => 255],
            [['text'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }




    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'title' => Yii::t('app', 'Sarlavha'),
            'top_title' => Yii::t('app', 'Yuqori Sarlavha'),
            'text' => Yii::t('app', 'Matin'),
        ];
    }

    public function fields(){

        return [
            'id',
            'top_title',
            'title',
            'text',
            'img' => function($model){
                return $model->getImageUrl();
            }
        ];
    }

 
    
    public function getImageUrl(){

        return $this->getUploadUrl('img');
    }



    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }

}
