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
		<h1>Insert Teachers</h1>
		<form method="POST" action="insertTeachers.php">
			<label for="name">Name:</label>
			<input type="text" name="name" required><br>

			<label for="name">Serial Number:</label>
			<input type="text" name="snumber" required><br>

			<label for="title">Title:</label>
			<select name="title" id="title" required>
				<?php
				include "config.php";
				$sql_select_majors = "SELECT id, name FROM titles";
				$result_majors = $conn->query($sql_select_majors);
				while ($row = $result_majors->fetch_assoc()) {
					echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
				}
				$conn->close();
				?>

			</select><br>


			<label for="phone">Phone:</label>
			<input type="tel" name="phone" required><br>

			<label for="email">Email:</label>
			<input type="email" name="email" required><br>

			<input type="submit" name="submit" class="submit" value="Insert">
		</form>
		<?php

		include "config.php";
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_POST['submit'])){

			$name = $_POST['name'];
			$snumber = $_POST['snumber'];
			$title_id = $_POST['title'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$sql = "INSERT INTO teachers (name, serial_number, title_id, phone, email)
			VALUES ('$name', '$snumber','$title_id', '$phone', '$email')";
			$result = mysqli_query($conn,$sql);
			if (!$result)
			{
				die('Error!');
			}
			else {
				echo " <p class='echo'> Added new teacher.<br>";
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