<?php 
	$mysqli=new mysqli('localhost','root','','sklad');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");

	$text="INSERT INTO material(name) VALUES ('".$_POST['name']."')"; 

	$result=$mysqli->query($text);
	
	if (!$result){
		$host=$_SERVER['HTTP_HOST'];
		header("Location: material.php");
	}
	else {
		header("Location: material.php");
	}
	