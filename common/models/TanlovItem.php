<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "tanlov_item".
 *
 * @property int $id
 * @property int $value
 * @property int $category_id
 * @property int|null $status
 *
 * @property Tanlov $category
 * @property TanlovItemLang[] $tanlovItemLangs
 */
class TanlovItem extends \yii\db\ActiveRecord
{
    
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;


    public static function tableName()
    {
        return 'tanlov_item';
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
            [['value', 'category_id', 'single', 'title'], 'required'],
            [['title', 'single'], 'string'],
            [['value', 'category_id', 'status'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tanlov::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Sarlavha'),
            'single' => Yii::t('app', 'Dona'),
            'value' => Yii::t('app', 'Qiymati'),
            'category_id' => Yii::t('app', 'Category ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Tanlov::className(), ['id' => 'category_id']);
    }

    public function fields(){

        return [
            'id',
            'title',
            'single' => function($model){
                return $model->single;
            },
            'value',
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
