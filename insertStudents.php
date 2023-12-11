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
		<h1>Insert Students</h1>
		<form method="POST" action="insertStudents.php">
			<label for="faculty_number">Faculty Number:</label>
			<input type="text" name="faculty_number" required><br>

			<label for="name">Name:</label>
			<input type="text" name="name" required><br>

			<label for="major">Major:</label>
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

			<label for="course">Course:</label>
			<input type="number" name="course" required><br>

			<label for="email">Email:</label>
			<input type="email" name="email" required><br>

			<input type="submit"  name="submit"  class="submit" value="Submit">
		</form>
	<?php

	include "config.php";
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_POST['submit'])){
		$faculty_number = $_POST['faculty_number'];
		$name = $_POST['name'];
		$major_id = $_POST['major'];
		$course = $_POST['course'];
		$email = $_POST['email'];


		$sql = "INSERT INTO students (faculty_number, name, major_id, course, email)
		VALUES ('$faculty_number', '$name', '$major_id', '$course', '$email')";
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die('Error!');
		}
		else {
			echo "  <p class='echo'> Added new student.<br>";
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