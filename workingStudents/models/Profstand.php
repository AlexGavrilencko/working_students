<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profstand".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @property CategoryProfstand[] $categoryProfstands
 */
class Profstand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profstand';
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
    public function getCategoryProfstands()
    {
        return $this->hasMany(CategoryProfstand::className(), ['profstand_id' => 'id']);
    }
}
