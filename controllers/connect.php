<?php 

$host = "db4free.net";
$username = "todolistactivity";
$password = "todopassword";
$dbname = "to_do_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die("connection failed: " . mysqli_error($conn));
}

echo "connected successfully <br>";





 ?>