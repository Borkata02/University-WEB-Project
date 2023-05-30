<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
	<?php 
	include "test.php";
	printHeader() 
	?>
	<div class="form">
		<form method="POST" action="insertDisciplines.php">
			<label for="name">Name:</label>
			<input type="text" name="name" required><br>
			
			<label for="semester">Semester:</label>
			<input type="text" name="semester" required><br>
			
			<label for="teacher">Teacher:</label>
			<select name="teacher" id="teacher" required>
				<?php
				include "config.php";
				$sql_select_teachers = "SELECT id, name FROM teachers";
				$result_teachers = $conn->query($sql_select_teachers);
				while ($row = $result_teachers->fetch_assoc()) {
					echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
				}
				$conn->close();
				?>
			</select><br>
			
			<input type="submit" name="submit" class="submit" value="Insert">
		</form>
		<?php

		$dbhost = 'localhost';
		$dbname = 'university';
		$dbuser = 'root';
		$dbpass = '';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$semester = $_POST['semester'];
			$teacher_id = $_POST['teacher'];


			$sql = "INSERT INTO disciplines (name, semester, teacher_id)
			VALUES ('$name', '$semester', '$teacher_id')";
			$result = mysqli_query($conn,$sql);
			if (!$result)
			{
				die('Error!');
			}
			else {
				echo "  <p class='echo'> Added new discipline.<br>";
			}

			$conn->close();
		}
		?>
	</div>
	<?php 
	printFooter() 
	?>
</body>
</html>