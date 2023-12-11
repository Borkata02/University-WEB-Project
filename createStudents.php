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
					$tableName = "students";
					$sqlCheck = "SHOW TABLES LIKE '$tableName'";
					$result = $conn->query($sqlCheck);
					if ($result->num_rows > 0) {
						echo "Table '$tableName' already exists\n";
					} else {
						$sql = "CREATE TABLE students (
						id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						faculty_number VARCHAR(20) NOT NULL,
						name VARCHAR(50) NOT NULL,
						major_id INT(11),
						FOREIGN KEY (major_id) REFERENCES majors (id),
						course INT(1) NOT NULL,
						email VARCHAR(50) NOT NULL
						)";
					if (mysqli_query($conn, $sql)) {
						echo "Table 'students' created successfully\n";
					} else {
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