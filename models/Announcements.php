<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Announcements".
 *
 * @property int $id
 * @property string $header
 * @property string $summary
 * @property string $Description
 * @property string $person
 * @property string $date
 * @property string $type
 * @property string $related_user_type
 */
class Announcements extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Announcements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header', 'summary', 'Description', 'person', 'type', 'related_user_type'], 'required'],
            [['Description', 'type', 'related_user_type'], 'string'],
            [['date'], 'safe'],
            [['header', 'person'], 'string', 'max' => 255],
            [['summary'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Header',
            'summary' => 'Summary',
            'Description' => 'Description',
            'person' => 'Person',
            'date' => 'Date',
            'type' => 'Type',
            'related_user_type' => 'Related User Type',
        ];
    }
    /**
     * @inheritdoc
     */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * @inheritdoc
     */

    public static function findIdentityByAccessToken($token, $type = null)
    {
          return static::findOne(['access_token' => $token]);
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
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
