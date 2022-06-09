<?php

namespace common\models;

use mohorev\file\UploadBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "muvofiq".
 *
 * @property int $id
 *
 * @property MuvofiqLang[] $muvofiqLangs
 */
class Muvofiq extends \yii\db\ActiveRecord
{
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return 'muvofiq';
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
                'class' => UploadBehavior::class,
                'attribute' => 'files',
                'scenarios' => ['default'],
                'path' => '@frontend/web/upload/muvofiq_file/{id}',
                'url' => '/upload/muvofiq_file/{id}',
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



    public function getUploadfile()
    {
        return $this->hasMany(Uploadfile::className(), ['muvofiq_id' => 'id']);
    }


    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }

    
    
    public function getImageUrl(){

        return $this->getUploadUrl('file');
    }



}
