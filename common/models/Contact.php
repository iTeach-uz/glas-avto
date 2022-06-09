<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $tel
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 */
class Contact extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'contact';
    }

    

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],

        ];
    }


    
    public function rules()
    {
        return [
            [['name', 'email', 'tel', 'status'], 'required'],
            [['status', 'created_at', 'updated_at',], 'integer'],
            [['name', 'tel', 'email'], 'string', 'max' => 255],
            ['tel', 'match', 'pattern' => '/\+[9][9][8][389][0134789][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/'],
            [['email'], 'email'],
            [['email'], 'unique']
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Ism'),
            'email' => Yii::t('app', 'Email'),
            'tel' => Yii::t('app', 'Telefon raqam'),
            'created_at' => Yii::t('app', 'Kiritilgan vaqt'),
            'updated_at' => Yii::t('app', 'O\'zgartirilgan vaqt'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
