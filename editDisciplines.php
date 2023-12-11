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
		<h1>Edit Discipline</h1>
		<form method="POST" action="editDisciplines.php">
			<label for="discipline">Disciplines:</label>
			<select name="discipline" id="discipline" required>
				<?php
				include "config.php";
				$sql_select_majors = "SELECT id, name FROM disciplines";
				$result_majors = $conn->query($sql_select_majors);
				while ($row = $result_majors->fetch_assoc()) {
					echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
				}
				$conn->close();
				?>

			</select><br>
			<label for="name">Discipline Name:</label>
			<input type="text" name="name"> <br>
			<input type="submit"  name="submit"  class="submit" value="EDIT">
		</form>
		<?php
		include "config.php";
		if(isset($_POST['submit'])){
			$discipline = $_POST['discipline'];
			$name = $_POST['name'];

			$sql = "UPDATE disciplines SET name = '$name' WHERE id =  $discipline";

			$result = $conn->query($sql);

			if($result){
				echo "<p class='echo'>Discipline name updated successfully.";
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