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
				$tableName = "teachers";
				$sqlCheck = "SHOW TABLES LIKE '$tableName'";
				$result = $conn->query($sqlCheck);
				if ($result->num_rows > 0) {
					echo "Table '$tableName' already exists\n";
				}
				else {
					$sql = "CREATE TABLE teachers (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(50) NOT NULL,
					title_id INT(10),
					FOREIGN KEY (title_id) REFERENCES titles (id),
					phone VARCHAR(20) NOT NULL,
					email VARCHAR(50) NOT NULL
					)";
				if (mysqli_query($conn, $sql)) {
					echo "Table 'teachers' created successfully\n";
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