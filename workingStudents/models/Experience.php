<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property int $id
 * @property int $resume_id
 * @property int $years
 * @property int $StudyOrWork
 * @property int $nameOrganiz_id
 * @property int $speciality_id
 * @property string $description
 *
 * @property Attributes $speciality
 * @property Organization $nameOrganiz
 * @property Resume $resume
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'years', 'StudyOrWork', 'nameOrganiz_id', 'speciality_id'], 'integer'],
            [['description'], 'string'],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['speciality_id' => 'id']],
            [['nameOrganiz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['nameOrganiz_id' => 'id']],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resume_id' => 'Resume ID',
            'years' => 'Years',
            'StudyOrWork' => 'Study Or Work',
            'nameOrganiz_id' => 'Name Organiz ID',
            'speciality_id' => 'Speciality ID',
            'description' => 'Description',
        ];
    }

    public function create()
    {
        $this->save();
        return $this;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'speciality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNameOrganiz()
    {
        return $this->hasOne(Organization::className(), ['id' => 'nameOrganiz_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResume()
    {
        return $this->hasOne(Resume::className(), ['id' => 'resume_id']);
    }
}
