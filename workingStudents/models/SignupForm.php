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


    public function rules()
    {
        return [
            [['login', 'e_mail', 'password','rang','password_repeat'], 'required'],
            [['password', 'login'],'string', 'min' => 8, 'max' => 32], //длинна от 8 до 32 символов
            [['login'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'login'], //имя(логин) уникально
            [['e_mail'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'e_mail'], //имя(логин) уникально
            ['e_mail', 'email'], //емэил это емэил
            ['password', 'compare'], //два пароля совпадают
        ];
    }
    public function attributeLabels()
    {
        return [
            'password_repeat' => 'Повторите пароль',
        ];
    }
    public function signup()
    {
        if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create();
        }
    }
}