<?php

session_start();

$login = 'klad';
$password = 'klad';


if ( isset($_POST['login'])  &&  isset($_POST['password']) ) //если форма отправлена
{
    if( $_POST['login'] === $login  &&  $_POST['password'] === $password ) //если логин и пароль совпадают
    {
        $_SESSION['auth'] = 1; //сессия это переменная которая храниться на сервере
        header('Location: testauth.php'); //редирект
        exit;
    }
}

echo 'Ошибка авторизации';
echo '<a href="/">Назад</a>';