<?php

namespace backend\models;

use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $fullname
 */
class Admin extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'fullname'], 'required'],
            [['username', 'password', 'fullname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'fullname' => Yii::t('app', 'Fullname'),
        ];
    }





    
    
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, ]);
    }

    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    
    public static function findByPasswordResetToken($token)
    {
       
    }

    
    public static function findByVerificationToken($token) {
        
    }

   



    public static function isPasswordResetTokenValid($token)
    {
       
    }

    
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    
    public function getAuthKey()
    {
        // return $this->auth_key;
    }

    
    public function validateAuthKey($authKey)
    {
        // return $this->getAuthKey() === $authKey;
    }

   
    public function validatePassword($password)
    {
        return $this->password === $password;;
    }

   
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    
    public function generateAuthKey()
    {
        // $this->auth_key = Yii::$app->security->generateRandomString();
    }


    public function generatePasswordResetToken()
    {
        // $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

     
    public function generateEmailVerificationToken()
    {
        // $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    
    public function removePasswordResetToken()
    {
        // $this->password_reset_token = null;
    }
}
