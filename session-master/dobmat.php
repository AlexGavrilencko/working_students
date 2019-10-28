<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Добавление материала</title>
</head>
<body>
		<a href="logout.php">Выход</a>
		<a href="material.php">Назад</a>
		<form method="POST" action="matsave.php">
			<table>
				<tr><th>Наименование</th><td><input name="name" value="" required></td></tr>
			</table>
				<input type="submit" value="Сохранить">
		</form>

</body>
</html>