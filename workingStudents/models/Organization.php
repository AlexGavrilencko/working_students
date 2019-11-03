<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property string $adres
 * @property string $inn
 * @property string $ogrn
 * @property string $image
 */
class Organization extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id','user_id'], 'integer'],
            [['name', 'adres', 'inn', 'ogrn', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID User',
            'name' => 'Name',
            'city_id' => 'City ID',
            'adres' => 'Adres',
            'inn' => 'Inn',
            'ogrn' => 'Ogrn',
            'image' => 'Image',
        ];
    }

    

    public function create()
    {
        return $this->save(false);
    }

    
}
