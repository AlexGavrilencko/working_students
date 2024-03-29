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
 * @property string $nameOrganiz
 * @property int $speciality_id
 * @property int $position_id
 * @property string $description
 *
 * @property Position $position
 * @property Resume $resume
 * @property Speciality $speciality
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
            [['resume_id', 'years', 'StudyOrWork', 'speciality_id', 'position_id'], 'integer'],
            [['description'], 'string'],
            [['nameOrganiz'], 'string', 'max' => 255],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_id' => 'id']],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Speciality::className(), 'targetAttribute' => ['speciality_id' => 'id']],
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
            'years' => 'Количество лет',
            'StudyOrWork' => 'Study Or Work',
            'nameOrganiz' => 'Название организации',
            'speciality_id' => 'Специальность',
            'position_id' => 'Должность',
            'description' => 'Описание',
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
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResume()
    {
        return $this->hasOne(Resume::className(), ['id' => 'resume_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['id' => 'speciality_id']);
    }
}
