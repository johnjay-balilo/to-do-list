<!DOCTYPE html>
<html lang="en">
<head>

	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	
	<title></title>
</head>
<body>

	<!-- <h1> TO-DO LIST </h1> -->

	<!-- <h2> Adding Task </h2> -->

	<form>
		<input type="text" id="new-task">
		<button id="addTaskBtn"> Add Task </button>
	</form>

	<script>
		$("#addTaskBtn").click( () => {
			const newTask = $('#new-task').val();

			$.ajax({
				method: 'GET',
				url: '../controllers/add_task.php',
				data: {name: newTask},
			}).done(console.log('added task'));

		});

	</script>

	<h1> Task List </h1>

	<ul id="taskList">

		<?php 

		require_once '../controllers/connect.php';

		$sql = "SELECT * FROM tasks";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)) { 
		?>

			<li data-id="<?php echo $row['id']; ?>">
				<?php echo $row['id']." ".$row['name']." "; ?>
				<button class="deleteTaskBtn"> Delete </button>
			</li>

		<?php } ?>

	</ul>



	 <script>
		$("#taskList").on('click', '.deleteTaskBtn', function() {
			const taskId = $(this).parent().attr("data-id");
			console.log(taskId);

			$.ajax({
				method: 'POST',
				url: '../controllers/remove_task.php',
				data: {taskId: taskId},
			}).done( data => {
				$(this).parent().fadeOut();
			});
		});
	</script>















</body>
</html>