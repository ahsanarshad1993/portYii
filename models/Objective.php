<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objective".
 *
 * @property integer $id
 * @property string $objective
 * @property string $check
 * @property integer $personalinfo_id
 *
 * @property Personalinfo $personalinfo
 */
class Objective extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'objective';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['objective', 'check', 'personalinfo_id'], 'required'],
            [['personalinfo_id'], 'integer'],
            [['check'], 'string', 'max' => 45],
            [['objective'], 'string', 'max' => 300],
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
            'objective' => 'Objective',
            'check' => 'Check',
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
