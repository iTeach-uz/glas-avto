<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "mahalliy".
 *
 * @property int $id
 *
 * @property MahalliyLang[] $mahalliyLangs
 */
class Mahalliy extends \yii\db\ActiveRecord
{
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return 'mahalliy';
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
            [['title', 'text'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['text'], 'string'],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Sarlavha'),
            'text' => Yii::t('app', 'Matin'),
        ];
    }

    public function fields(){

        return [
            'id',
            'title',
            'text',
        ];
    }


    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }


}
