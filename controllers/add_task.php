<?php 

require_once('./connect.php');

$newTask = $_GET['name'];

$sql = "INSERT INTO tasks(name) VALUES ('$newTask')";
$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	echo 'new Task added successfully';
} else {
	echo 'error: '.$sql."<br>".mysqli_error($conn);
}

// Close a previously opened database connection
mysqli_close($conn);

 ?>