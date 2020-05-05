<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "special_profstand".
 *
 * @property int $id
 * @property int $categProfstand_id
 * @property int $bigspeciality_id
 *
 * @property BigSpeciality $bigspeciality
 * @property Profstand $categProfstand
 */
class SpecialProfstand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'special_profstand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categProfstand_id', 'bigspeciality_id'], 'integer'],
            [['bigspeciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => BigSpeciality::className(), 'targetAttribute' => ['bigspeciality_id' => 'id']],
            [['categProfstand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profstand::className(), 'targetAttribute' => ['categProfstand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categProfstand_id' => 'Categ Profstand ID',
            'bigspeciality_id' => 'Bigspeciality ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBigspeciality()
    {
        return $this->hasOne(BigSpeciality::className(), ['id' => 'bigspeciality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategProfstand()
    {
        return $this->hasOne(Profstand::className(), ['id' => 'categProfstand_id']);
    }
}
