<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Добавление приходной накладной</title>
</head>
<body>
		<a href="logout.php">Выход</a>
		<a href="material.php">Назад</a>
		<?php 
			$mysqli = new mysqli('localhost','root','','sklad');
			if ($mysqli->connect_errno) 
			{
				echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
				return false;
			};
			$mysqli->set_charset("utf8");
		?>
		<p>Приходная накладная</p>
		<form method="POST" action="matsave.php">
			<table>
				<tr><th>Дата</th><td><input type="date" name="name" value="" required></td></tr>
				<tr><th>Поставщик</th><td><select>
				<?php 
					$base = "select name from postavchik"; 
					$result=$mysqli->query($base);
						while ($row = mysqli_fetch_assoc($result))
						{
							echo "<option>".$row['name']."</option>";
						}
				?>
				</select></tr>
				<tr><td>Название материала</td><td>Количество</td><td>Цена</td></tr>
				<tr>
				<td><input name="name" value="" required></td>
				<td><input name="name" value="" required></td>
				<td><input  name="name" value="" required></td>
				</tr>
			</table>
			<a href="dobprichod.php"><input type='button' value='Добавить материал'></a><br><br>
				<input type="submit" value="Сохранить">
		</form>

</body>
</html>