<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projectimage".
 *
 * @property integer $id
 * @property string $image
 * @property integer $project_id
 *
 * @property Project $project
 */
class Projectimage extends \yii\db\ActiveRecord
{
    public $picture;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projectimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picture', 'file'], 'safe'],
            [['picture'], 'file', 'extensions'=>'jpg, gif, png'],
            [['project_id'], 'required'],
            [['project_id'], 'integer'],
            // [['image'], 'string', 'max' => 45],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'project_id' => 'Project ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
