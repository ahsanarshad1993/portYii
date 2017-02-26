<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personalinfo".
 *
 * @property integer $id
 * @property string $name
 * @property string $birthday
 * @property string $picture
 * @property string $resume
 *
 * @property Contact[] $contacts
 * @property Coverletters[] $coverletters
 * @property Education[] $educations
 * @property Project[] $projects
 * @property Reference[] $references
 * @property Skill[] $skills
 * @property Workexperiance[] $workexperiances
 */
class Personalinfo extends \yii\db\ActiveRecord
{
    public $image;
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personalinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'file'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['file'], 'file', 'extensions'=>'doc, pdf'],
            [['name', 'image', 'file'], 'required'],
            // [['picture'], 'string', 'max' => 500],
            [['name', 'birthday'], 'string', 'max' => 45],
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
            'birthday' => 'Birthday',
            'picture' => 'Picture',
            'resume' => 'Resume',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['personalinfo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoverletters()
    {
        return $this->hasMany(Coverletters::className(), ['personalinfo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['personalinfo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['personalinfo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReferences()
    {
        return $this->hasMany(Reference::className(), ['personalinfo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skill::className(), ['personalinfo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkexperiances()
    {
        return $this->hasMany(Workexperiance::className(), ['personalinfo_id' => 'id']);
    }
}
