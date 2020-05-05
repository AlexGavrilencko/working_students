<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_profstand".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $profstand_id
 *
 * @property Profstand $profstand
 * @property Position[] $positions
 */
class CategoryProfstand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_profstand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profstand_id'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
            [['profstand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profstand::className(), 'targetAttribute' => ['profstand_id' => 'id']],
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
            'profstand_id' => 'Profstand ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfstand()
    {
        return $this->hasOne(Profstand::className(), ['id' => 'profstand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['categprofst_id' => 'id']);
    }
}
