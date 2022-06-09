<?php

namespace common\models;

use zxbodya\yii2\galleryManager\GalleryBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "sertifikat".
 *
 * @property int $id
 * @property int $status
 *
 * @property SertifikatItem[] $sertifikatItems
 * @property SertifikatLang[] $sertifikatLangs
 */
class Sertifikat extends \yii\db\ActiveRecord
{
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

   
    public static function tableName()
    {
        return 'sertifikat';
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
        ];
    }

   
    public function rules()
    {
        return [
            [['status', 'title'], 'required'],
            [['title', 'text'], 'string'],
            [['status'], 'integer'],
            [['text'], 'safe'],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Sarlavha'),
            'text' => Yii::t('app', 'Matin'),
            'status' => Yii::t('app', 'Status'),
        ];
    }


    /**
     * Gets query for [[SertifikatItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSertifikatItems()
    {
        return $this->hasMany(SertifikatItem::className(), ['category_id' => 'id']);
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
