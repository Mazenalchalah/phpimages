<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property string $authKey
 *
 * @property Images[] $images
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['firstName', 'lastName', 'username', 'password', 'authKey'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['authKey'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['user_id' => 'id']);
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function getId() {
          return $this->id;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey; 
    }

    public static function findIdentity($id): \yii\web\IdentityInterface {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): \yii\web\IdentityInterface {
        throw new \yii\base\NotSupportedExeption();
    }
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
     public function validatePassword($password){
        return $this->password === $password;
    }

}
