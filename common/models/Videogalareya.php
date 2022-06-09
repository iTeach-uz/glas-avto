<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use restapi\models\Url;
use Yii;

/**
 * This is the model class for table "videogalareya".
 *
 * @property int $id
 * @property string $img
 *
 * @property VideogalareyaLang[] $videogalareyaLangs
 */
class Videogalareya extends \yii\db\ActiveRecord
{ 

    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";


    use MultilingualLabelsTrait;

    
    
    public static function tableName()
    {
        return 'videogalareya';
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
                    'title'
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/videogal_img/{id}',
                'url' => '/frontend/web/upload/videogal_img/{id}',
                'thumbs' => [
                    'preview' => ['width' => 500],
                ],
            ],
        ];
    }

    
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['title', 'url'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['img',], 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

    
    // public function scenarios(){
        
    //     $scenarios = parent::scenarios();

    //     $scenarios[self::SCENARIO_UPDATE] = ['title', 'url'];

    //     return $scenarios;
    // }



    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'url' => Yii::t('app', 'Url'),
            'title' => Yii::t('app', 'Sarlvaha'),
        ];
    }
    
    public function fields(){

        return [
            'id',
            'title',
            'url',
            'img' => function($model){
                return $model->getImageUrl();
            }
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
