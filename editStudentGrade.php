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

		if (isset($_POST['grade_id']) && isset($_POST['new_grade'])) {
			$gradeId = $_POST['grade_id'];
			$newGrade = $_POST['new_grade'];

			$updateQuery = "UPDATE grades SET grade = ? WHERE id = ?";
			$stmt = mysqli_prepare($conn, $updateQuery);
			mysqli_stmt_bind_param($stmt, "si", $newGrade, $gradeId);
			
			if (mysqli_stmt_execute($stmt)) {
				echo "<p class='echo'>Grade edited successfully.</p>";
			} else {
				echo "<p class='echo'>Error editing grade: " . mysqli_error($conn) . "</p>";
			}
			
			mysqli_stmt_close($stmt);
		}

		mysqli_close($conn);

		?>
		<a href="editGrades.php" class="editAndDelete">Go Back</a>
	</div>

	<?php 
	printFooter() 
	?>
	
</body>
</html>