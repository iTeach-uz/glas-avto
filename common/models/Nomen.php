<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "nomen".
 *
 * @property int $id
 * @property string $img
 * @property string $model
 * @property string $number
 *
 * @property NomenLang[] $nomenLangs
 */
class Nomen extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return 'nomen';
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
                'path' => '@frontend/web/upload/nomen/{id}',
                'url' => '/frontend/web/upload/nomen/{id}',
                'thumbs' => [
                    'preview' => ['width' => 132,],
                ],
            ],
        ];
    }

    
    public function rules()
    {
        return [
            [['title', 'model', 'number', 'status'], 'required'],
            [['status'], 'integer'],
            [['title', 'model', 'number'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

    
      

    // public function scenarios(){
        
    //     $scenarios = parent::scenarios();

    //     $scenarios[self::SCENARIO_UPDATE] = ['title', 'model', 'number', 'status'];

    //     return $scenarios;
    // }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'title' => Yii::t('app', 'Sarlavha'),
            'model' => Yii::t('app', 'Model'),
            'number' => Yii::t('app', 'Raqami'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    
    public function getImageUrl(){

        return $this->getUploadUrl('img');
    }



    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
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
