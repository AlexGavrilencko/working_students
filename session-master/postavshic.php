<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postavxhici</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<a href="testauth.php">Назад</a>
		<a href="logout.php">Выход</a>
		<table>
		<tr class="trz"><td>id</td><td>name</td><td>nomber</td></tr>
		<?php 
			$mysqli = new mysqli('localhost','root','','sklad');
			if ($mysqli->connect_errno) 
			{
				echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
				return false;
			};
			$mysqli->set_charset("utf8");
			
				$base="SELECT * FROM postavchic"; 
				$result=$mysqli->query($base);
				//echo $result;
				while ($row = mysqli_fetch_assoc($result))
				{
				echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['nomber']."</td></tr>";
				}


		?>
		</table>
</body>
</html>