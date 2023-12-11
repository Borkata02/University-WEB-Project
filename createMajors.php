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
			$tableName = "majors";
			$sqlCheck = "SHOW TABLES LIKE '$tableName'";
			$result = $conn->query($sqlCheck);
			if ($result->num_rows > 0) {
				echo "Table '$tableName' already exists\n";
			}
			else {
				$sql= "CREATE TABLE majors (
					id INT(11) PRIMARY KEY AUTO_INCREMENT,
					name VARCHAR(100) NOT NULL
				)";

				if (mysqli_query($conn, $sql)) {
					echo "Table 'majors' created successfully\n";
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