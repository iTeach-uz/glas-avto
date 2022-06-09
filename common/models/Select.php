<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "select".
 *
 * @property int $id
 * @property string $img
 *
 * @property SelectLang[] $selectLangs
 */
class Select extends \yii\db\ActiveRecord
{
    
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";

    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'select';
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
                    'title', 'text'
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/select_img/{id}',
                'url' => '/frontend/web/upload/select_img/{id}',
                'thumbs' => [
                    'preview' => ['width' => 449],
                ],
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['title', 'text'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

          

    public function scenarios(){
        
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_UPDATE] = ['title', 'text'];

        return $scenarios;
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'title' => Yii::t('app', 'Sarlavha'),
            'text' => Yii::t('app', 'Matin'),
        ];
    }

 
    public function fields(){

        return [
            'id',
            'img',
            'title',
            'text',
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
