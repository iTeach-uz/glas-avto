<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use restapi\models\Url;
use Yii;

/**
 * This is the model class for table "rahbaryat".
 *
 * @property int $id
 * @property string $img
 * @property string $fullname
 * @property string $email
 * @property int|null $status
 *
 * @property RahbaryatLang[] $rahbaryatLangs
 */
class Rahbaryat extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = "update";

    const SCENARIO_CREATE = "create";
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;

    use MultilingualLabelsTrait;

   
    
    public static function tableName()
    {
        return 'rahbaryat';
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
                    'job'
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/rahbaryat_img/{id}',
                'url' => '/frontend/web/upload/rahbaryat_img/{id}',
                'thumbs' => [
                    'preview' => ['width' => 126],
                ],
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['job', 'fullname', 'email'], 'required'],
            [['status'], 'integer'],
            [['job', 'fullname', 'email'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }


         
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'job' => Yii::t('app', 'Kasbi'),
            'fullname' => Yii::t('app', 'Ism va Familya'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

 
    public function fields(){

        return [
            'id',
            'job',
            'fullname',
            'email',
            'img' => function($model){
                return $model->getImageUrl();
            }
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
