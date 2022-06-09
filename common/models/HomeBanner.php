<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "home_banner".
 *
 * @property int $id
 * @property string $img
 *
 * @property HomeBannerLang[] $homeBannerLangs
 */
class HomeBanner extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";

    const SCENARIO_CREATE = "create";
    
    use MultilingualLabelsTrait;

   
    public static function tableName()
    {
        return 'home_banner';
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
                    'title', 'text'
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/home_banner/{id}',
                'url' => '/frontend/web/upload/home_banner/{id}',
                'thumbs' => [
                    'preview' => ['width' => 1440],
                ],
            ],
        ];
    }


    public function rules()
    {
        return [
            [['title','text'],'required'],
            [['title'], 'string', 'max' => 255],
            [['text'], 'string'],
            [['img'], 'file',"skipOnEmpty" =>true, 'extensions' => 'png, jpg'],
            [['img',], 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

   


    // public function scenarios(){
        
    //     $scenarios = parent::scenarios();

    //     $scenarios[self::SCENARIO_CREATE] = ['img'];

    //     return $scenarios;
    // }



    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasim'),
            'title' => Yii::t('app', 'Sarlavha'),
            'text' => Yii::t('app', 'Matin'),
        ];
    }



    
    public function getImageUrl(){

        return $this->getThumbUploadUrl('img', 'preview');
    }

    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }
}
