<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property string $extension
 * @property integer $personalinfo_id
 *
 * @property Personalinfo $personalinfo
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'description', 'personalinfo_id'], 'required'],
            [['personalinfo_id'], 'integer'],
            [['type', 'description', 'extension'], 'string', 'max' => 45],
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
            'type' => 'Type',
            'description' => 'Description',
            'extension' => 'Extension',
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
