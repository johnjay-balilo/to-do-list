<?php 

require_once('./connect.php');

$taskId = $_POST['taskId'];

$sql = "DELETE FROM tasks WHERE id='$taskId'";
$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	echo 'Task deleted successfully';
} else {
	echo 'error: '.$sql."<br>".mysqli_error($conn);
}

// Close a previously opened database connection
mysqli_close($conn);

 ?>