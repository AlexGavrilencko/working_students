<?php

namespace app\models;

use Yii;

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
class Organization extends \yii\db\ActiveRecord
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
            [['city_id'], 'integer'],
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
            'name' => 'Name',
            'city_id' => 'City ID',
            'adres' => 'Adres',
            'inn' => 'Inn',
            'ogrn' => 'Ogrn',
            'image' => 'Image',
        ];
    }

    public function signupwork()
    {
        if($this->validate())
        {
            $org = new Organization();
            $org->attributes = $this->attributes;
            return $org->create();
        }
    }

    public function create()
    {
        return $this->save(false);
    }

    
}
