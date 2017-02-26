<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property integer $id
 * @property string $degree
 * @property string $institute
 * @property string $start
 * @property string $end
 * @property string $description
 * @property integer $personalinfo_id
 *
 * @property Personalinfo $personalinfo
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start', 'end'], 'safe'],
            [['personalinfo_id'], 'required'],
            [['personalinfo_id'], 'integer'],
            [['degree', 'institute'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
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
            'degree' => 'Degree',
            'institute' => 'Institute',
            'start' => 'Start',
            'end' => 'End',
            'description' => 'Description',
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
