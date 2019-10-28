<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $city_id
 * @property string $dateBirth
 * @property string $image
 * @property string $skills
 * @property string $personalQualities_id
 * @property int $CareerObjective_id
 * @property string $dateAdd
 * @property string $dateChanges
 * @property int $ShowOrHide
 * @property string $response
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'city_id', 'CareerObjective_id', 'ShowOrHide'], 'integer'],
            [['dateBirth', 'dateAdd', 'dateChanges'], 'safe'],
            [['skills', 'personalQualities_id'], 'string'],
            [['name', 'surname', 'patronymic', 'image', 'response'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'city_id' => 'City ID',
            'dateBirth' => 'Date Birth',
            'image' => 'Image',
            'skills' => 'Skills',
            'personalQualities_id' => 'Personal Qualities ID',
            'CareerObjective_id' => 'Career Objective ID',
            'dateAdd' => 'Date Add',
            'dateChanges' => 'Date Changes',
            'ShowOrHide' => 'Show Or Hide',
            'response' => 'Response',
        ];
    }
}
