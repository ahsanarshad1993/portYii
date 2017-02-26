<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reference".
 *
 * @property integer $id
 * @property string $name
 * @property string $designation
 * @property string $company
 * @property string $review
 * @property string $contact
 * @property string $url
 * @property string $email
 * @property integer $personalinfo_id
 *
 * @property Personalinfo $personalinfo
 */
class Reference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'personalinfo_id'], 'required'],
            [['personalinfo_id'], 'integer'],
            [['name', 'designation', 'company', 'contact', 'url', 'email'], 'string', 'max' => 100],
            [['review'], 'string', 'max' => 1000],
            [['personalinfo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Personalinfo::className(), 'targetAttribute' => ['personalinfo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'designation' => 'Designation',
            'company' => 'Company',
            'review' => 'Review',
            'contact' => 'Contact',
            'url' => 'Url',
            'email' => 'Email',
            'personalinfo_id' => 'Personalinfo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalinfo()
    {
        return $this->hasOne(Personalinfo::className(), ['id' => 'personalinfo_id']);
    }
}
