<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Vxod</title>
</head>
<body>
    
    <!-- Форма где логин и пароль отправляете -->
    <form action="login.php" method="POST" >
        <input type="text" placeholder="login" name="login" >
        <br>
        <input type="text" placeholder="password" name="password" >
        <br>
        <button value="auth" name="auth">Вход</button>
    </form>

    <!-- проверка авторизации 
    <a href="testauth.php">ТЕСТ авторизации</a>
	-->
    <!-- Выход (доступно только если авторизированыы) -->
    <? if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) { ?>
        <br>
        <a href="logout.php">Выход</a>
    <?php };  ?>


</body>
</html>