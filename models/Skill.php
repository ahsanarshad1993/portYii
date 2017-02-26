<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill".
 *
 * @property integer $id
 * @property string $name
 * @property string $percent
 * @property string $description
 * @property integer $personalinfo_id
 *
 * @property Personalinfo $personalinfo
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'personalinfo_id'], 'required'],
            [['personalinfo_id'], 'integer'],
            [['name', 'percent', 'description'], 'string', 'max' => 45],
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
            'percent' => 'Percent',
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
