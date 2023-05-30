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
		<form method="POST" action="insertGrades.php">
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
			
			<label for="grade">Grade:</label>
			<input type="number" name="grade" min="2" max="6" required><br>
			
			<label for="discipline">Discipline:</label>
			<select name="discipline" id="discipline" required>
				<?php
				include "config.php";
				$sql_select_disciplines = "SELECT id, name FROM disciplines";
				$result_disciplines = $conn->query($sql_select_disciplines);
				while ($row = $result_disciplines->fetch_assoc()) {
					echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
				}
				$conn->close();
				?>
			</select><br>
			
			<label for="date">Date:</label>
			<input type="date" name="date"   pattern="\d{2}-\d{2}-\d{2}" required><br>
			
			<input type="submit" name="submit" class="submit" value="Insert">
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
				$student_id = $_POST['student'];
				$discipline_id = $_POST['discipline'];
				$grade = $_POST['grade'];
				$date = $_POST['date'];


				$sql = "INSERT INTO grades (student_id, discipline_id, grade, date)
				VALUES ('$student_id', '$discipline_id', '$grade', '$date')";
				$result = mysqli_query($conn,$sql);
				if (!$result)
				{
					die('Error!');
				}
				else {
					echo " <p class='echo'> Added new grade.<br>";
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