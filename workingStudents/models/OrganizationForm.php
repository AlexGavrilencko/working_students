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

    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['name', 'adres', 'inn', 'ogrn'], 'string', 'max' => 255],
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