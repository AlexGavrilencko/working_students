<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property int $attrcat_id
 * @property string $code
 * @property string $name
 *
 * @property Attributes $attrcat
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
            [['attrcat_id'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255],
            [['attrcat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['attrcat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attrcat_id' => 'Attrcat ID',
            'code' => 'Code',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrcat()
    {
        return $this->hasOne(Attributes::className(), ['id' => 'attrcat_id']);
    }
}
