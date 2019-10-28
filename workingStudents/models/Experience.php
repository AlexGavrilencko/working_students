<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $dateStart
 * @property string $dateEnd
 * @property int $StudyOrWork
 * @property int $nameOrganiz_id
 * @property int $speciality_id
 * @property string $description
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
            [['resume_id', 'StudyOrWork', 'nameOrganiz_id', 'speciality_id'], 'integer'],
            [['dateStart', 'dateEnd'], 'safe'],
            [['description'], 'string'],
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
            'dateStart' => 'Date Start',
            'dateEnd' => 'Date End',
            'StudyOrWork' => 'Study Or Work',
            'nameOrganiz_id' => 'Name Organiz ID',
            'speciality_id' => 'Speciality ID',
            'description' => 'Description',
        ];
    }
}
