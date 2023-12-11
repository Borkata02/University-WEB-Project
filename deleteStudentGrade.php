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
		<?php
		include "config.php";

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if (isset($_GET['grade_id'])) {
			$gradeId = $_GET['grade_id'];

			$deleteQuery = "DELETE FROM grades WHERE id = $gradeId";
			if (mysqli_query($conn, $deleteQuery)) {
				echo "<p class='echo'> Grade deleted successfully.";
			} else {
				echo " <p class='echo'> Error deleting grade: " . mysqli_error($conn);
			}
		}

		$conn->close();
		?>
		<a href="deleteGrades.php" class="editAndDelete">Go Back</a>
	</div>
	<?php 
	printFooter() 
	?>
	
</body>
</html>