<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Advert".
 *
 * @property int $id
 * @property string $type
 * @property string $person
 * @property string $status
 * @property string $description
 * @property string $department
 * @property string $advert_date
 * @property string $expired_date
 * @property string $company_name
 * @property string $company_website
 * @property string $comment
 * @property int $quota
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Advert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'person', 'status', 'description', 'department', 'company_name', 'company_website', 'comment', 'quota'], 'required'],
            [['type', 'status', 'department'], 'string'],
            [['advert_date', 'expired_date'], 'safe'],
            [['quota'], 'integer'],
            [['person', 'description', 'company_name', 'company_website'], 'string', 'max' => 255],
            [['comment'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'person' => 'Person',
            'status' => 'Status',
            'description' => 'Description',
            'department' => 'Department',
            'advert_date' => 'Advert Date',
            'expired_date' => 'Expired Date',
            'company_name' => 'Company Name',
            'company_website' => 'Company Website',
            'comment' => 'Comment',
            'quota' => 'Quota',
        ];
    }
}
