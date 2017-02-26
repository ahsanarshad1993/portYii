<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coverletters".
 *
 * @property integer $id
 * @property string $name
 * @property string $body
 * @property string $check
 * @property integer $personalinfo_id
 *
 * @property Personalinfo $personalinfo
 */
class Coverletters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coverletters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'body', 'check', 'personalinfo_id'], 'required'],
            [['personalinfo_id'], 'integer'],
            [['name', 'check'], 'string', 'max' => 45],
            [['body'], 'string', 'max' => 2500],
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
            'body' => 'Body',
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
