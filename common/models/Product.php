<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use restapi\models\Url;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $img
 * @property int $category_id
 * @property int|null $status
 *
 * @property ProductCategory $category
 * @property ProductLang[] $productLangs
 */
class Product extends \yii\db\ActiveRecord
{
    
    const SCENARIO_UPDATE = "update";
    
    const SCENARIO_CREATE = "create";
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

    
    public static function tableName()
    {
        return 'product';
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
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/product_imgs/{id}',
                'url' => '/frontend/web/upload/product_imgs/{id}',
                'thumbs' => [
                    'preview' => ['width' => 331],
                ],
            ],
        ];
    }


    
    public function rules()
    {
        return [
            [['category_id', 'title'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            ['img', 'required', 'on' => self::SCENARIO_CREATE],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Rasm'),
            'title' => Yii::t('app', 'Sarlavha'),
            'category_id' => Yii::t('app', 'Category ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }



    
    public function getCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'category_id']);
    }

   
    public function fields(){

        return [
            'id',
            'title',
            'img' => function($model){
                return $model->imageUrl;
            },
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
