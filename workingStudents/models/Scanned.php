<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scanned".
 *
 * @property int $id
 * @property int $user_id
 * @property int $vacancy_id
 * @property int $resume_id
 * @property int $ViewOrSelect
 */
class Scanned extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scanned';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'vacancy_id', 'resume_id', 'ViewOrSelect'], 'integer'],
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
            'vacancy_id' => 'Vacancy ID',
            'resume_id' => 'Resume ID',
            'ViewOrSelect' => 'View Or Select',
        ];
    }

    public function create()
    {
        $this->save();
        return $this;
    }
}
