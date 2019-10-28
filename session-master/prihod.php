<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Приход</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<a href="testauth.php">Назад</a>
		<a href="logout.php">Выход</a>
		<table>
		<tr class="trz"><td>№</td><td>Дата</td></tr>
		<?php 
			$mysqli = new mysqli('localhost','root','','sklad');
			if ($mysqli->connect_errno) 
			{
				echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
				return false;
			};
			$mysqli->set_charset("utf8");
			
				$base = "select id, date from prixod_nak"; 
				$result=$mysqli->query($base);
				while ($row = mysqli_fetch_assoc($result))
				{
					echo "<tr><td >".$row['id']."</td>
					<td>".$row['date']."</td>
					<td><a href='.php?id=".$row['id']."'>Просмотр</a></td>
					<td><a href='.php?id=".$row['id']."'>Ред.</a></td>
					<td><a onclick='del(this)'  href=.php?id=".$row['id'].">Удалить</a></td>
					</tr>";
				}


		?>
		</table>
		<br>
		<a href="doprihod.php"><input type='button' value='Добавить запись'></a>
		<script>
</body>
</html>