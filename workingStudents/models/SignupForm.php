<?php


namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $login;
    public $e_mail;
    public $password;
    public $password_repeat;
    public $rang;
    public $personaldate;


    public function rules()
    {
        return [
            [['login', 'e_mail', 'password','rang','password_repeat','personaldate'], 'required'],
            [['password', 'login'],'string', 'min' => 8, 'max' => 32], //длинна от 8 до 32 символов
            [['login'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'login'], //имя(логин) уникально
            [['e_mail'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'e_mail'], //имя(логин) уникально
            ['e_mail', 'email'], //емэил это емэил
            ['password', 'compare'], //два пароля совпадают
            [['personaldate'],'in','range'=>[1]],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'e_mail' => 'Электронная почта',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'personaldate'=>'Я согласна (согласен) на обработку персональных данных'
        ];
    }

    public function signup()
    {
        if($this->validate())
        {
           // var_dump($this['personaldate']);die();
            $user = new User();
            $user->attributes = $this->attributes;
           // var_dump($user->create());die();
            return $user->create();
        }
    }
}