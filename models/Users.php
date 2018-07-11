<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Users".
 *
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $authority
 * @property string $department
 */
class Users extends \yii\db\ActiveRecord
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
            [['user_name', 'password', 'name', 'surname', 'email', 'authority', 'department'], 'required'],
            [['authority', 'department'], 'string'],
            [['user_name', 'name', 'surname'], 'string', 'max' => 30],
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
            'user_name' => 'User Name',
            'password' => 'Password',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'authority' => 'Authority',
            'department' => 'Department',
        ];
    }
}
