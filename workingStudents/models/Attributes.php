<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attributes".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 *
 * @property Experience[] $experiences
 * @property Organization[] $organizations
 * @property Position[] $positions
 * @property Resume[] $resumes
 * @property Resume[] $resumes0
 * @property Resume[] $resumes1
 * @property Vacancy[] $vacancies
 * @property Vacancy[] $vacancies0
 * @property Vacancy[] $vacancies1
 * @property Vacancy[] $vacancies2
 * @property Vacancy[] $vacancies3
 * @property Vacancy[] $vacancies4
 */
class Attributes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attributes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiences()
    {
        return $this->hasMany(Experience::className(), ['speciality_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['attrcat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumes()
    {
        return $this->hasMany(Resume::className(), ['personalQualities_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumes0()
    {
        return $this->hasMany(Resume::className(), ['CareerObjective_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumes1()
    {
        return $this->hasMany(Resume::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies0()
    {
        return $this->hasMany(Vacancy::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies1()
    {
        return $this->hasMany(Vacancy::className(), ['employment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies2()
    {
        return $this->hasMany(Vacancy::className(), ['experience_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies3()
    {
        return $this->hasMany(Vacancy::className(), ['position_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies4()
    {
        return $this->hasMany(Vacancy::className(), ['schedule_id' => 'id']);
    }
}
