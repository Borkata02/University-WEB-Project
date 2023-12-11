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
		<h1>Edit Grades</h1>
		<form method="POST" action="editGrades.php">
			<label for="subject">Student:</label>
			<select name="student" id="student" required>
				<?php
				include "config.php";
				$sql_select_majors = "SELECT id, name FROM students";
				$result_majors = $conn->query($sql_select_majors);
				while ($row = $result_majors->fetch_assoc()) {
					echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
				}
				$conn->close();
				?>

			</select><br>
			<input type="submit"  name="submit"  class="submit" value="EDIT">
		</form>
		<?php

		include "config.php";
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_POST['submit'])){
			$student = $_POST['student'];

			mysqli_begin_transaction($conn);

			$sql = "SELECT students.name AS student_name, disciplines.name AS discipline_name, grades.grade, grades.date, grades.id
			FROM grades
			INNER JOIN students ON grades.student_id = students.id
			INNER JOIN disciplines ON grades.discipline_id = disciplines.id
			WHERE students.id = $student";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo "<table class='table'>";
				echo "<tr class='tr'><th class='th'>Student Name</th><th class='th'>Average Score</th><th class='th'>Grade</th><th class='th'>New grade to edit</th><th class='th'>Edit</th></tr>";
				while ($row = $result->fetch_assoc()) {
					$student_name = $row['student_name'];
					$discipline_name = $row['discipline_name'];
					$grade = $row['grade'];
					$gradeId = $row['id'];

					echo "<tr class='tr'><td class='td'>$student_name</td><td class='td'>$discipline_name</td><td class='td'>$grade</td>
					<td class='td'>
					<form method='POST' action='editStudentGrade.php'>
					<input type='hidden' name='grade_id' value='$gradeId'>
					<input type='number' name='new_grade' min='2' max='6' required>
					</td>
					<td class='td'>
					<input type='submit' class='submitNew' value='Edit' style='color: #ffaa31; text-decoration: none; border: 0px; background: #393939;'>
					</form></tr>";
					
				}
				echo "</table>";
			}
		}
		$conn->close();
		?>
	</div>
	<?php 
	printFooter() 
	?>
	
</body>
</html>