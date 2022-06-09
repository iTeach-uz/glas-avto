<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use restapi\models\Url;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $img
 * @property int|null $view_count
 * @property string|null $date
 * @property int $status
 *
 * @property NewsLang[] $newsLangs
 */
class News extends \yii\db\ActiveRecord
{
    
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";

    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return 'news';
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
                'path' => '@frontend/web/upload/news_img/{id}',
                'url' => '/frontend/web/upload/news_img/{id}',
                'thumbs' => [
                    'preview' => ['width' => 300],
                ],
            ],
        ];
    }



    
    public function rules()
    {
        return [
            [['title', 'text', 'status'], 'required'],
            [['view_count', 'status'], 'integer'],
            [['date', 'view_count'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['text'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

    



    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'view_count' => Yii::t('app', 'Ko\'rishlar Soni'),
            'date' => Yii::t('app', 'Vaqt'),
            'title' => Yii::t('app', 'Sarlavha'),
            'text' => Yii::t('app', 'Matin'),
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
            },
            'date',
            'view_count',
        ];
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
