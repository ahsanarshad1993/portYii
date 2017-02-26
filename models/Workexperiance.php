<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workexperiance".
 *
 * @property integer $id
 * @property string $company
 * @property string $start
 * @property string $end
 * @property string $position
 * @property string $details
 * @property integer $personalinfo_id
 *
 * @property Technologyexperiance[] $technologyexperiances
 * @property Personalinfo $personalinfo
 */
class Workexperiance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workexperiance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company', 'start', 'personalinfo_id'], 'required'],
            [['start', 'end'], 'safe'],
            [['personalinfo_id'], 'integer'],
            [['company', 'position'], 'string', 'max' => 45],
            [['details'], 'string', 'max' => 500],
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
            'company' => 'Company',
            'start' => 'Start',
            'end' => 'End',
            'position' => 'Position',
            'details' => 'Details',
            'personalinfo_id' => 'Personalinfo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnologyexperiances()
    {
        return $this->hasMany(Technologyexperiance::className(), ['workexperiance_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalinfo()
    {
        return $this->hasOne(Personalinfo::className(), ['id' => 'personalinfo_id']);
    }
}
