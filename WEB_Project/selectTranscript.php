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
		<form method="POST" action="selectTranscript.php" >
			<label for="student">Student:</label>
			<select name="student" id="student" required>
				<?php
				include "config.php";

				$sql_select_students = "SELECT id, name FROM students";
				$result_students = $conn->query($sql_select_students);
				while ($row = $result_students->fetch_assoc()) {
					echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
				}
				$conn->close();
				?>
			</select><br>

			<input type="submit" name="submit" class="submit" value="Submit">
		</form>
		<?php

		include "config.php";
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if(isset($_POST['submit'])){
			$student_id = $_POST['student'];

			$studentQuery = "
			SELECT s.*, m.name AS major_name
			FROM students s
			JOIN majors m ON s.major_id = m.id
			WHERE s.id = '$student_id'
			LIMIT 1
			";

			$studentResult = mysqli_query($conn, $studentQuery);

			$studentRow = mysqli_fetch_assoc($studentResult);
			$studentMajor = $studentRow['major_name'];
			$studentName = $studentRow['name'];
			$studentFaculty = $studentRow['faculty_number'];
			$studentCourse = $studentRow['course'];
			echo "<p class='echo'>Student: $studentName";
			echo "<p class='echo'>Faculty Number: $studentFaculty";
			echo "<p class='echo'>Course: $studentCourse";
			echo "<p class='echo'>Specialty: $studentMajor";
			
			$sql = "SELECT disciplines.name AS discipline_name, grades.grade
			FROM grades
			INNER JOIN disciplines ON grades.discipline_id = disciplines.id
			WHERE grades.student_id = $student_id";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table class='table'>";
				echo "<tr class='tr'><th class='th'>Discipline</th><th>Grade</th></tr>";

				$total_grades = 0;
				$total_count = 0;

				while ($row = $result->fetch_assoc()) {
					$discipline_name = $row['discipline_name'];
					$grade = $row['grade'];

					echo "<tr class='tr'><td class='td'>$discipline_name</td><td class='td'>$grade</td></tr>";

					$total_grades += $grade;
					$total_count++;
				}

				$average_score = ($total_count > 0) ? round($total_grades / $total_count, 2) : 0;

				echo "<tr class='tr' ><td class='td'><strong>Average Score:</strong></td><td class='td'><strong>$average_score</strong></td></tr>";
				echo "</table>";
			} else {
				echo " <p class='echo'> No grades found for the selected student";
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