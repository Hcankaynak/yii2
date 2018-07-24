<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "Users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $authority
 * @property string $department
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'name', 'surname', 'email', 'authority', 'department'], 'required'],
            [['authority', 'department'], 'string'],
            [['username', 'name', 'surname'], 'string', 'max' => 30],
            [['password', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'User Name',
            'password' => 'Password',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'authority' => 'Authority',
            'department' => 'Department',
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
 * @inheritdoc
 */
/* modified */
public static function findIdentityByAccessToken($token, $type = null)
{
      return static::findOne(['access_token' => $token]);
}

/* removed
public static function findIdentityByAccessToken($token)
{
    throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
}
*/
/**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
public static function findByUsername($username)
{
    return static::findOne(['username' => $username]);
}

/**
 * Finds user by password reset token
 *
 * @param  string      $token password reset token
 * @return static|null
 */
public static function findByPasswordResetToken($token)
{
    $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
    $parts = explode('_', $token);
    $timestamp = (int) end($parts);
    if ($timestamp + $expire < time()) {
        // token expired
        return null;
    }

    return static::findOne([
        'password_reset_token' => $token
    ]);
}

/**
 * @inheritdoc
 */
public function getId()
{
    return $this->getPrimaryKey();
}

/**
 * @inheritdoc
 */
public function getAuthKey()
{
    return $this->auth_key;
}

/**
 * @inheritdoc
 */
public function validateAuthKey($authKey)
{
    return $this->getAuthKey() === $authKey;
}

/**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
public function validatePassword($password)
{
    return $this->password === md5($password);

;

}

/**
 * Generates password hash from password and sets it to the model
 *
 * @param string $password
 */
public function setPassword($password)
{
    $this->password_hash = md5($password);
}

/**
 * Generates "remember me" authentication key
 */
public function generateAuthKey()
{
    $this->auth_key = Security::generateRandomKey();
}

/**
 * Generates new password reset token
 */
public function generatePasswordResetToken()
{
    $this->password_reset_token = Security::generateRandomKey() . '_' . time();
}

/**
 * Removes password reset token
 */
public function removePasswordResetToken()
{
    $this->password_reset_token = null;
}
/** EXTENSION MOVIE **/


}
