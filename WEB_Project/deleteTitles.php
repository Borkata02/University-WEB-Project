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
		<form method="POST" action="deleteTitles.php">
			<label for="subject">Titles<label>
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
			<input type="submit"  name="submit"  class="submit" value="Delete">
		</form>
		<p class="echo">NOTE: YOU ARE GOING TO DELETE ALL GRADES, DISCIPLINES AND TEACHERS RELATED TO THAT TITLE!</p>
		<?php

		include "config.php";
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_POST['submit'])){
			$titleIdToDelete = $_POST['title'];

			mysqli_begin_transaction($conn);

			try {
				$deleteGradesQuery = "DELETE FROM grades WHERE discipline_id IN (SELECT id FROM disciplines WHERE teacher_id = $titleIdToDelete)";
				mysqli_query($conn, $deleteGradesQuery);

				$deleteGradesQuery = "DELETE FROM disciplines WHERE teacher_id IN (SELECT id FROM teachers WHERE title_id = $titleIdToDelete)";
				mysqli_query($conn, $deleteGradesQuery);

				$getStudentsQuery = "SELECT name FROM teachers WHERE title_id = $titleIdToDelete";
				$result = mysqli_query($conn, $getStudentsQuery);

				$teachers = [];
				while ($row = mysqli_fetch_assoc($result)) {
					$teachers[] = $row['name'];
				}

				$deleteStudentsQuery = "DELETE FROM teachers WHERE title_id = $titleIdToDelete";
				mysqli_query($conn, $deleteStudentsQuery);

				$getMajorNameQuery = "SELECT name FROM titles WHERE id = $titleIdToDelete";
				$result = mysqli_query($conn, $getMajorNameQuery);
				$majorName = mysqli_fetch_assoc($result)['name'];

				$deleteMajorQuery = "DELETE FROM titles WHERE id = $titleIdToDelete";
				mysqli_query($conn, $deleteMajorQuery);

				mysqli_commit($conn);

				echo "<p class='echo'>Major '$majorName' and related student records successfully deleted.<br>";
				echo "<table class='table'>";
				echo "<tr class='tr'><th class='th'>Deleted Teachers</th></tr>";
				foreach ($teachers as $teacher) {
					echo "<tr class='tr'><td class='td'>$teacher</td></tr>";
				}
				echo"</table>";
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