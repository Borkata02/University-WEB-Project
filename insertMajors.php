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
		<h1>Insert Major/Specialty</h1>
		<form method="POST" action="insertMajors.php">
			<label for="subject">Speciality Name:</label>
			<input type="text" name="subject" required><br>
			<input type="submit"  name="submit"  class="submit" value="Insert">
		</form>
	<?php

	include "config.php";
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_POST['submit'])){
		$subject = $_POST['subject'];

		$sql = "INSERT INTO majors (name)
		VALUES ('$subject')";
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die('Error!');
		}
		else {
			echo "  <p class='echo'> Added new speciality.<br>";
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