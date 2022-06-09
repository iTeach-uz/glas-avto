<?php

namespace common\models;

use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property int|null $status
 *
 * @property ProductCategoryLang[] $productCategoryLangs
 * @property Product[] $products
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    
    use MultilingualLabelsTrait;

   
    public static function tableName()
    {
        return 'product_category';
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


    public function fields(){
        return [
            'id',
            'title',
            'items' => function($model){
                return $model->products;
            }
        ];
    }
   
    public function rules()
    {
        return [
            [['status', 'title'], 'required'],
            [['title'], 'string'],
            [['status'], 'integer'],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Sarlavha'),
            'status' => Yii::t('app', 'Status'),
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

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
