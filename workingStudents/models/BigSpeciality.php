<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "big_speciality".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @property SpecialProfstand[] $specialProfstands
 * @property Speciality[] $specialities
 */
class BigSpeciality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'big_speciality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialProfstands()
    {
        return $this->hasMany(SpecialProfstand::className(), ['bigspeciality_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialities()
    {
        return $this->hasMany(Speciality::className(), ['bigspecial_id' => 'id']);
    }
}
