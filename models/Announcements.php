<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Announcements".
 *
 * @property int $id
 * @property string $header
 * @property string $description
 * @property string $person
 * @property string $date
 * @property string $type
 * @property string $related_user_type
 */
class Announcements extends \yii\db\ActiveRecord
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
            [['header', 'description', 'person', 'type', 'related_user_type'], 'required'],
            [['description', 'type', 'related_user_type'], 'string'],
            [['date'], 'safe'],
            [['header', 'person'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'person' => 'Person',
            'date' => 'Date',
            'type' => 'Type',
            'related_user_type' => 'Related User Type',
        ];
    }
}
