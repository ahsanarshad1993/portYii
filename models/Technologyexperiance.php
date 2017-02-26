<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "technologyexperiance".
 *
 * @property integer $id
 * @property string $name
 * @property integer $workexperiance_id
 *
 * @property Workexperiance $workexperiance
 */
class Technologyexperiance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technologyexperiance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'workexperiance_id'], 'required'],
            [['workexperiance_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['workexperiance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Workexperiance::className(), 'targetAttribute' => ['workexperiance_id' => 'id']],
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
            'workexperiance_id' => 'Workexperiance ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkexperiance()
    {
        return $this->hasOne(Workexperiance::className(), ['id' => 'workexperiance_id']);
    }
}
