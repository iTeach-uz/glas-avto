<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "afzal".
 *
 * @property int $id
 * @property string $icon
 * @property int $status
 *
 * @property AfzalLang[] $afzalLangs
 */
class Afzal extends \yii\db\ActiveRecord
{
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

   
    
    public static function tableName()
    {
        return 'afzal';
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
        ];
    }


    
    public function rules()
    {
        return [
            [['status', 'title'], 'required'],
            [['status'], 'integer'],
            [['icon'],'safe'],
            [['icon', 'title'], 'string', 'max' => 255],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'icon' => Yii::t('app', 'Ikonka'),
            'title' => Yii::t('app', 'Sarlavha'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function fields(){

        return [
            'id',
            'title',
            // 'icon',
        ];
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
