<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Редактирование записи</title>
</head>
<body>
		<a href="logout.php">Выход</a>
		<a href="material.php">Назад</a>
		<form method="POST" action="matsavered.php?id=<?=$_GET['id']?>">
		<?php 
			$mysqli=new mysqli('localhost','root','','sklad');
			if ($mysqli->connect_errno) {
				echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
				return false;
			};
			$mysqli->set_charset("utf8");
			if (isset($_GET['id'])){
				$text="select * from material where id=".$_GET['id']; 
				$result=$mysqli->query($text);
				$row = mysqli_fetch_assoc($result);
			} else {
				$host=$_SERVER['HTTP_HOST'];
				header("Location: material.php");
				
			};
		?>

			<table>
				<tr><td>Наименование</td><td><input name="name" value="<?=$row['name']?>" required></td></tr>
			</table>
				<input type="submit" value="Сохранить">
		</form>

</body>
</html>