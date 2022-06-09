<?php

namespace common\models;

use zxbodya\yii2\galleryManager\GalleryBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "tashkilot".
 *
 * @property int $id
 */
class Tashkilot extends \yii\db\ActiveRecord
{
    
    

    use MultilingualLabelsTrait;


    public static function tableName()
    {
        return 'tashkilot';
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
            'galleryBehavior' => [
                'class' => GalleryBehavior::class,
                'type' => 'tashkilot',
                'extension' => 'png',
                'directory' => Yii::getAlias('@frontend/web') . '/images/avtooyna/gallery',
                'url' => '/frontend/web/images/avtooyna/gallery',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(500, 500));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 500;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
   
        ];
    }


    
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function fields(){

        return [
            'id',
            'title',
            'text',
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
    
    
    
    public static function find()
    {
        $query = new MultilingualQuery(get_called_class());
        return $query->multilingual();
    }



    public function images($type = 'medium')
    {

        $images = [];

        foreach ($this->getBehavior('galleryBehavior')->getImages() as $key=>$image) {

            $images[$key] = $image->getUrl($type);
        }
        return $images;

    }

    public function image($type = 'medium')
    {
        $images = $this->images($type);

        if (empty($images)) {

            return '';
        }

        return $images[0];
    }


}
