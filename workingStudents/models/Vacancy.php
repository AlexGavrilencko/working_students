<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $organization_id
 * @property int $city_id
 * @property int $experience_id
 * @property int $employment_id
 * @property int $schedule_id
 * @property int $salary
 * @property int $position_id
 * @property string $duties
 * @property string $requirement
 * @property string $conditions
 * @property int $category_id
 * @property string $dateAdd
 * @property string $dateChanges
 * @property int $WorkOrPractice
 * @property int $ShowOrHide
 * @property string $description
 * @property int $viewed
 *
 * @property Response[] $responses
 * @property Scanned[] $scanneds
 * @property BigSpeciality $category
 * @property Attributes $city
 * @property Attributes $employment
 * @property Attributes $experience
 * @property Organization $organization
 * @property Position $position
 * @property Attributes $schedule
 * @property User $user
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'organization_id', 'city_id', 'experience_id', 'employment_id', 'schedule_id', 'salary', 'position_id', 'category_id', 'WorkOrPractice', 'ShowOrHide', 'viewed'], 'integer'],
            [['duties', 'requirement', 'conditions', 'description'], 'string'],
            [['dateAdd', 'dateChanges'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BigSpeciality::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['employment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['employment_id' => 'id']],
            [['experience_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['experience_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['schedule_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'organization_id' => 'Organization ID',
            'city_id' => 'City ID',
            'experience_id' => 'Experience ID',
            'employment_id' => 'Employment ID',
            'schedule_id' => 'Schedule ID',
            'salary' => 'Salary',
            'position_id' => 'Position ID',
            'duties' => 'Duties',
            'requirement' => 'Requirement',
            'conditions' => 'Conditions',
            'category_id' => 'Category ID',
            'dateAdd' => 'Date Add',
            'dateChanges' => 'Date Changes',
            'WorkOrPractice' => 'Work Or Practice',
            'ShowOrHide' => 'Show Or Hide',
            'description' => 'Description',
            'viewed' => 'Viewed',
        ];
    }
    public function create()
    {
        return $this->save(false);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['vacancy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScanneds()
    {
        return $this->hasMany(Scanned::className(), ['vacancy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BigSpeciality::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployment()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'employment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperience()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'experience_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
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
    public function getSchedule()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'schedule_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
