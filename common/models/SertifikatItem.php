<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use restapi\models\Url;
use Yii;

/**
 * This is the model class for table "sertifikat_item".
 *
 * @property int $id
 * @property string $img
 * @property int $category_id
 * @property int|null $status
 *
 * @property Sertifikat $category
 * @property SertifikatItemLang[] $sertifikatItemLangs
 */
class SertifikatItem extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

    
    
    public static function tableName()
    {
        return 'sertifikat_item';
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
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/ser_item/{id}',
                'url' => '/frontend/web/upload/ser_item/{id}',
                'thumbs' => [
                    'preview' => ['width' => 300],
                ],
            ],
        ];
    }

    
    public function rules()
    {
        return [
            [['text', 'category_id', 'title'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['text'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sertifikat::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['img'], 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

     

    // public function scenarios(){
        
    //     $scenarios = parent::scenarios();

    //     $scenarios[self::SCENARIO_UPDATE] = ['text', 'category_id', 'title'];

    //     return $scenarios;


    // }





    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'title' => Yii::t('app', 'Sarlavha'),
            'text' => Yii::t('app', 'text'),
            'category_id' => Yii::t('app', 'Category ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function fields(){
        return [
            'id',
            'title',
            'text',
            'img' => function($model){
                return $model->getImageUrl();
            }
        ];
    }


    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Sertifikat::className(), ['id' => 'category_id']);
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
