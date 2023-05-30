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
		<div class="createDB">
			<?php
			include "config.php";
			$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
			if (mysqli_query($conn, $sql)) {
				echo "Database created successfully\n";
			} else {
				echo 'Error creating database: ' . mysqli_error($conn) . "\n";
			}
			mysqli_close($conn);
		?>
		</div>
	</div>
	<?php 
		 printFooter() 
	?>
</body>
</html>							