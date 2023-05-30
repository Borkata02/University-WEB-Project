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
		<form method="POST" action="editTitles.php">
			<label for="titles">Titles:</label>
			<select name="titles" id="titles" required>
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
			<label for="name">Title Name:</label>
			<input type="text" name="name"> <br>
			<input type="submit"  name="submit"  class="submit" value="EDIT">
		</form>
		<?php
		include "config.php";
		if(isset($_POST['submit'])){
			$titles = $_POST['titles'];
			$name = $_POST['name'];

			$sql = "UPDATE titles SET name = '$name' WHERE id =  $titles";

			$result = $conn->query($sql);

			if($result){
				echo "<p class='echo'>Title name updated successfully.";
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