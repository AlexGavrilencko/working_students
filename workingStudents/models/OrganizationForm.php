<?php

namespace app\models;

use Yii;
use yii\base\Model;

class OrganizationForm extends Model
{
    public $name;
    public $city_id;
    public $adres;
    public $inn;
    public $ogrn;
    public $user_id;

    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['name', 'adres', 'inn', 'ogrn'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID User',
            'name' => 'Наименование организации',
            'city_id' => 'Город',
            'adres' => 'Адрес',
            'inn' => 'ИННН',
            'ogrn' => 'ОГРН',
            'image' => 'Логотип',
        ];
    }

   
    public function organization()
    {
        if($this->validate())
        {
            $org= new organization();
            $org->attributes = $this->attributes;
            return $org->create();
        }
    }
}
