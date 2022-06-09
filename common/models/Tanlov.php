<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "tanlov".
 *
 * @property int $id
 * @property string $img
 * @property string|null $date
 * @property int|null $status
 *
 * @property TanlovItem[] $tanlovItems
 * @property TanlovLang[] $tanlovLangs
 */
class Tanlov extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";
     
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'tanlov';
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
                'path' => '@frontend/web/upload/tanlov/{id}',
                'url' => '/frontend/web/upload/tanlov/{id}',
                'thumbs' => [
                    'preview' => ['width' => 277],
                ],
            ],
        ];
    }


    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['date', 'text', 'view_count'], 'safe'],
            [['status', 'view_count'], 'integer'],
            [['title', 'text'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

          

    // public function scenarios(){
        
    //     $scenarios = parent::scenarios();

    //     $scenarios[self::SCENARIO_UPDATE] = ['title', 'status'];

    //     return $scenarios;
    // }


    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'title' => Yii::t('app', 'Sarlavha'),
            'text' => Yii::t('app', 'Matin'),
            'date' => Yii::t('app', 'Vaqt'),
            'view_count' => Yii::t('app', 'Ko\'rishlar soni'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[TanlovItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTanlovItems()
    {
        return $this->hasMany(TanlovItem::className(), ['category_id' => 'id']);
    }



    
    public function getImageUrl(){

        return $this->getThumbUploadUrl('img', 'preview');
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
