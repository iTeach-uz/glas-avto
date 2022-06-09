<?php

namespace common\models;

use mohorev\file\UploadBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "yoshlar".
 *
 * @property int $id
 * @property string $url
 *
 * @property YoshlarLang[] $yoshlarLangs
 */
class Yoshlar extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";
    
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'yoshlar';
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
                    'title', 'content'
                ]
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'file',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/yoshlarIttifoqi_file/{id}',
                'url' => '/frontend/web/upload/yoshlarIttifoqi_file/{id}',
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['url', 'title', 'content'], 'string', 'max' => 255],
            [['url'], 'safe'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf'],
            ['file', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

          

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Sarlvaha'),
            'content' => Yii::t('app', 'Mazmuni'),
            'file' => Yii::t('app', 'Fayl'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

 
    
    public function getImageUrl(){

        return $this->getUploadUrl('file');
    }



    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }
}
