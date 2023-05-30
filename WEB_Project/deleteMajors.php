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
		<form method="POST" action="deleteMajors.php">
			<label for="subject">Speciality Name:</label>
			<select name="major" id="major" required>
				<?php
				include "config.php";
				$sql_select_majors = "SELECT id, name FROM majors";
				$result_majors = $conn->query($sql_select_majors);
				while ($row = $result_majors->fetch_assoc()) {
					echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
				}
				$conn->close();
				?>

			</select><br>
			<input type="submit"  name="submit"  class="submit" value="Delete">
			<p class="echo">NOTE: YOU ARE GOING TO DELETE ALL STUDENTS AND THEIR GRADES RELATED TO THAT MAJOR!</p>
		</form>
		<?php

		include "config.php";
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_POST['submit'])){
			$majorIdToDelete = $_POST['major'];

			mysqli_begin_transaction($conn);

			try {
				$deleteGradesQuery = "DELETE FROM grades WHERE student_id IN (SELECT id FROM students WHERE major_id = $majorIdToDelete)";
				mysqli_query($conn, $deleteGradesQuery);

				$getStudentsQuery = "SELECT name FROM students WHERE major_id = $majorIdToDelete";
				$result = mysqli_query($conn, $getStudentsQuery);

				$students = [];
				while ($row = mysqli_fetch_assoc($result)) {
					$students[] = $row['name'];
				}

				$deleteStudentsQuery = "DELETE FROM students WHERE major_id = $majorIdToDelete";
				mysqli_query($conn, $deleteStudentsQuery);

				$getMajorNameQuery = "SELECT name FROM majors WHERE id = $majorIdToDelete";
				$result = mysqli_query($conn, $getMajorNameQuery);
				$majorName = mysqli_fetch_assoc($result)['name'];

				$deleteMajorQuery = "DELETE FROM majors WHERE id = $majorIdToDelete";
				mysqli_query($conn, $deleteMajorQuery);

				mysqli_commit($conn);

				echo "<p class='echo'>Major '$majorName' and related student records successfully deleted.<br>";
				echo "<table class='table'>";
				echo "<tr class='tr'><th class='th'>Deleted Students</th></tr>";
				foreach ($students as $student) {
					echo "<tr class='tr'><td class='td'>$student</td></tr>";
				}
				echo"</table>";
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