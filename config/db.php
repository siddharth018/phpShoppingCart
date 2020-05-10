<?php
// Replace you database configration inside of variable
$servername = 'localhost';
$username = 'root';
$password = 'root';
$db = 'shopping_Cart';

$con = mysqli_connect($servername,$username,$password,$db);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}
?>