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
		<form method="POST" action="deleteDisciplines.php">
			<label for="discipline">Discipline:</label>
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
			<input type="submit"  name="submit"  class="submit" value="Delete">
		</form>
		<?php

		include "config.php";
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_POST['submit'])){
			$discipline = $_POST['discipline'];

			mysqli_begin_transaction($conn);

			try {
				 $deleteGradesQuery = "DELETE FROM grades WHERE discipline_id = $discipline";
       			mysqli_query($conn, $deleteGradesQuery);

				$getMajorNameQuery = "SELECT name FROM disciplines WHERE id = $discipline";
				$result = mysqli_query($conn, $getMajorNameQuery);
				$majorName = mysqli_fetch_assoc($result)['name'];

				$deleteDisciplineQuery = "DELETE FROM disciplines WHERE id = $discipline";
        		mysqli_query($conn, $deleteDisciplineQuery);

				mysqli_commit($conn);

				echo "<p class='echo'>Discipline '$majorName' and related student records successfully deleted.<br>";
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