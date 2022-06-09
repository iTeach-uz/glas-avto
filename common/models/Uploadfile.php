<?php

namespace common\models;

use mohorev\file\UploadBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "uploadfile".
 *
 * @property int $id
 * @property string $file
 * @property int $muvofiq_id
 * @property int $status
 *
 * @property Muvofiq $muvofiq
 * @property UploadfileLang[] $uploadfileLangs
 */
class Uploadfile extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";
    
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return 'uploadfile';
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
                'class' => UploadBehavior::class,
                'attribute' => 'file',
                'scenarios' => ['default', 'update'],
                'path' => '@frontend/web/upload/upload_files/{id}',
                'url' => '/frontend/web/upload/upload_files/{id}',
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['muvofiq_id', 'status', 'title'], 'required'],
            [['muvofiq_id', 'status'], 'integer'],
            [['title'], 'string'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf, doc, docx'],
            [['muvofiq_id'], 'exist', 'skipOnError' => true, 'targetClass' => Muvofiq::className(), 'targetAttribute' => ['muvofiq_id' => 'id']],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

 



    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file' => Yii::t('app', 'File'),
            'title' => Yii::t('app', 'Sarlavha'),
            'muvofiq_id' => Yii::t('app', 'Muvofiq ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Muvofiq]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMuvofiq()
    {
        return $this->hasOne(Muvofiq::className(), ['id' => 'muvofiq_id']);
    }


    public function fields(){
        return [
            'id', 
            'title',
            'file' => function($model){
                return $model->getImageUrl();
            },
        ];
    }

    
    public function getImageUrl(){

        return $this->getUploadUrl('file');
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
