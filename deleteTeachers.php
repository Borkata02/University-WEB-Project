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
		<h1>Delete Teachers</h1>
		<form method="POST" action="deleteTeachers.php">
			<label for="subject">Teachers:</label>
			<select name="teacher" id="teacher" required>
				<?php
				include "config.php";
				$sql_select_majors = "SELECT id, name FROM teachers";
				$result_majors = $conn->query($sql_select_majors);
				while ($row = $result_majors->fetch_assoc()) {
					echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
				}
				$conn->close();
				?>

			</select><br>
			<input type="submit"  name="submit"  class="submit" value="Delete">
		</form>
		<?php

		include "config.php";
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_POST['submit'])){
			$teacher = $_POST['teacher'];

			mysqli_begin_transaction($conn);

			try {
				$deleteGradesQuery = "DELETE FROM grades WHERE discipline_id IN (SELECT id FROM disciplines WHERE teacher_id = $teacher)";
				mysqli_query($conn, $deleteGradesQuery);

				$getMajorNameQuery = "SELECT name FROM teachers WHERE id = $teacher";
				$result = mysqli_query($conn, $getMajorNameQuery);
				$majorName = mysqli_fetch_assoc($result)['name'];

				$deleteStudentsQuery = "DELETE FROM disciplines WHERE teacher_id = $teacher";
				mysqli_query($conn, $deleteStudentsQuery);

				$deleteStudentsQuery = "DELETE FROM teachers WHERE id = $teacher";
				mysqli_query($conn, $deleteStudentsQuery);

				mysqli_commit($conn);

				echo "<p class='echo'>Teacher '$majorName' and related student records and disciplines are successfully deleted.<br>";
			} catch (Exception $e) {

				mysqli_rollback($conn);

				echo "Error: " . $e->getMessage();
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