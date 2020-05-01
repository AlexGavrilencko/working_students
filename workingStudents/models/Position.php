<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property int $categprofst_id
 * @property string $code
 * @property string $name
 *
 * @property CategoryProfstand $categprofst
 * @property Resume[] $resumes
 * @property Vacancy[] $vacancies
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categprofst_id'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
            [['categprofst_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryProfstand::className(), 'targetAttribute' => ['categprofst_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categprofst_id' => 'Categprofst ID',
            'code' => 'Код',
            'name' => 'Наименование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategprofst()
    {
        return $this->hasOne(CategoryProfstand::className(), ['id' => 'categprofst_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumes()
    {
        return $this->hasMany(Resume::className(), ['CareerObjective_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['position_id' => 'id']);
    }
}
