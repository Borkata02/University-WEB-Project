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
		<form method="POST" action="editTeachers.php">
			<label for="teachers">Titles:</label>
			<select name="teachers" id="teachers" required>
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
			<label for="name">Teachers Name:</label>
			<input type="text" name="name"> <br>
			<input type="submit"  name="submit"  class="submit" value="EDIT">
		</form>
		<?php
		include "config.php";
		if(isset($_POST['submit'])){
			$teachers = $_POST['teachers'];
			$name = $_POST['name'];

			$sql = "UPDATE teachers SET name = '$name' WHERE id =  $teachers";

			$result = $conn->query($sql);

			if($result){
				echo "<p class='echo'>Teacher name updated successfully.";
			}
			else {
				echo "Error executing query: " . mysqli_error($conn);
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