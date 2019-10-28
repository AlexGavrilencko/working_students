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
 * @property string $response
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
            [['user_id', 'organization_id', 'city_id', 'experience_id', 'employment_id', 'schedule_id', 'salary', 'position_id', 'category_id', 'WorkOrPractice', 'ShowOrHide'], 'integer'],
            [['duties', 'requirement', 'conditions'], 'string'],
            [['dateAdd', 'dateChanges'], 'safe'],
            [['name', 'response'], 'string', 'max' => 255],
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
            'response' => 'Response',
        ];
    }
}
