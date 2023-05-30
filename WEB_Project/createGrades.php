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
	<div class="main">
		<div class="createTable">
			<?php
				include "config.php";
				$tableName = "grades";
				$sqlCheck = "SHOW TABLES LIKE '$tableName'";
				$result = $conn->query($sqlCheck);
				if ($result->num_rows > 0) {
					echo "Table '$tableName' already exists\n";
				}
				else {
					$sql= "CREATE TABLE grades (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					student_id INT(6) UNSIGNED,
					FOREIGN KEY (student_id) REFERENCES students(id),
					discipline_id INT(6) UNSIGNED,
					FOREIGN KEY (discipline_id) REFERENCES disciplines(id),
					grade DECIMAL(3,2) NOT NULL,
					date DATE NOT NULL
					
					
				)";
				if (mysqli_query($conn, $sql)) {
					echo "Table 'grades' created successfully\n";
				}else {
					echo 'Error creating table: ' . mysqli_error($conn) . "\n";
				}
				mysqli_close($conn);
				}
			?>
		</div>
	</div>
	<?php 
		printFooter() 
	?>
</body>
</html>