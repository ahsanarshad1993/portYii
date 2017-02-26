<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $description
 * @property integer $personalinfo_id
 *
 * @property Personalinfo $personalinfo
 * @property Projectimage[] $projectimages
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'personalinfo_id'], 'required'],
            [['personalinfo_id'], 'integer'],
            [['name', 'link'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 1000],
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
            'link' => 'Link',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectimages()
    {
        return $this->hasMany(Projectimage::className(), ['project_id' => 'id']);
    }
}
