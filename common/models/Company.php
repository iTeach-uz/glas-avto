<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $img
 * @property string $number1
 * @property string $number2
 * @property string $number3
 *
 * @property CompanyLang[] $companyLangs
 */
class Company extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = 'update';
    
    const SCENARIO_CREATE = "create";
    
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'company';
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
                    'title', 'text', 'block_title1', 'block_title2', 'block_title3'
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/biz_haq/{id}',
                'url' => '/frontend/web/upload/biz_haq/{id}',
                'thumbs' => [
                    'preview' => ['width' => 570],
                ],
            ],
        ];
    }

    
    public function rules()
    {
        return [
            [['number1', 'number2', 'number3', 'title', 'block_title1', 'block_title2', 'block_title3'], 'required'],
            [['number1', 'number2', 'number3', 'title', 'block_title1', 'block_title2', 'block_title3'], 'string', 'max' => 255],
            [['text'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }


    // public function scenarios(){
    //     $scenarios = parent::scenarios();

    //     $scenarios[self::SCENARIO_UPDATE] = ['number1', 'number2', 'number3', 'title', 'block_title1', 'block_title2', 'block_title3'];

    //     return $scenarios;
    // }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'title' => Yii::t('app', 'Sarlavha'),
            'text' => Yii::t('app', 'Matin'),
            'number1' => Yii::t('app', 'Mutaxasis soni'),
            'number2' => Yii::t('app', 'Kadirlar soni'),
            'number3' => Yii::t('app', 'Maxsulotlar soni'),
            'block_title1' => Yii::t('app', 'Mutaxasis Sarlavhasi'),
            'block_title2' => Yii::t('app', 'Kadirlar Sarlavhasi'),
            'block_title3' => Yii::t('app', 'Maxsulotlar Sarlavhasi'),
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
