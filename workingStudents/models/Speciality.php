<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speciality".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $bigspecial_id
 *
 * @property Experience[] $experiences
 * @property BigSpeciality $bigspecial
 */
class Speciality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'speciality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bigspecial_id'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
            [['bigspecial_id'], 'exist', 'skipOnError' => true, 'targetClass' => BigSpeciality::className(), 'targetAttribute' => ['bigspecial_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'bigspecial_id' => 'Bigspecial ID',
        ];
    }

    public function create()
    {
        return $this->save(false);
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
    public function getBigspecial()
    {
        return $this->hasOne(BigSpeciality::className(), ['id' => 'bigspecial_id']);
    }
}
