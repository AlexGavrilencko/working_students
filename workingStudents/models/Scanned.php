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
 * @property string $date
 * @property int $ViewOrSelect
 *
 * @property Vacancy $vacancy
 * @property Resume $resume
 * @property User $user
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
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancy::className(), 'targetAttribute' => ['vacancy_id' => 'id']],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_id' => 'id']],
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
            'user_id' => 'User ID',
            'vacancy_id' => 'Vacancy ID',
            'resume_id' => 'Resume ID',
            'date' => 'Date',
            'ViewOrSelect' => 'View Or Select',
        ];
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
	}

    public function create()
    {
        $this->save();
        return $this;
    }

    public function delete()
    {
        $this->delete();
        return $this;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::className(), ['id' => 'vacancy_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
