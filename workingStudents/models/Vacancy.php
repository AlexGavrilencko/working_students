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
            'name' => 'Наименование вакансии',
            'user_id' => 'User ID',
            'organization_id' => 'Организация',
            'city_id' => 'Город',
            'experience_id' => 'Опыт работы',
            'employment_id' => 'Тип занятости',
            'schedule_id' => 'График работы',
            'salary' => 'Заработанная плата',
            'position_id' => 'Должность',
            'duties' => 'Обязанности',
            'requirement' => 'Требования',
            'conditions' => 'Условия',
            'category_id' => 'Категория',
            'dateAdd' => 'Дата добавления',
            'dateChanges' => 'Дата редактирования',
            'WorkOrPractice' => 'Работа\Практика',
            'ShowOrHide' => 'Показывать\Скрывать',
            'response' => 'Отклик',
        ];
    }
}
