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
 * @property Organization[] $organizations
 * @property Resume[] $resumes
 * @property Vacancy[] $vacancies
 * @property Vacancy[] $vacancies0
 * @property Vacancy[] $vacancies1
 * @property Vacancy[] $vacancies2
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
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumes()
    {
        return $this->hasMany(Resume::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies0()
    {
        return $this->hasMany(Vacancy::className(), ['employment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies1()
    {
        return $this->hasMany(Vacancy::className(), ['experience_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies2()
    {
        return $this->hasMany(Vacancy::className(), ['schedule_id' => 'id']);
    }
}
