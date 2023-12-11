<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/x-icon" href="logo2.png">
	<title>Document</title>
</head>
<body>
	<div class="form">
		<form action="login.php" method="post">
			<h1>Login</h1>
			<?php
			if (isset($error_message)) {
				echo "<p style='color: red;'>$error_message</p>";
			}
			?>
			 <label for="identity_number">Faculty Number/Serial Number:</label>
        <input type="text" id="identity_number" name="identity_number" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required> <br>

			<input type="submit" name="submit" class="submit" value="Log in">
		</form>
		 <span class="echo">Don't have an accout? Try to <a href="register.php">Register</a> your account.  </span>
	
	<?php
	session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$identity_number = $_POST['identity_number'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE identity_number = '$identity_number'";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		$row = mysqli_fetch_assoc($result);

		if ($row && password_verify($password, $row['password'])) {
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['identity_number'] = $row['identity_number'];

    if ($row['user_type'] == 'student') {
        $studentQuery = "SELECT name FROM students WHERE faculty_number = ?";
    } elseif ($row['user_type'] == 'teacher') {
        $teacherQuery = "SELECT name FROM teachers WHERE serial_number = ?";
    }

    $stmt = $conn->prepare($row['user_type'] == 'student' ? $studentQuery : $teacherQuery);
    $stmt->bind_param("s", $row['identity_number']);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    $_SESSION['user_name'] = $userData['name'];
			 var_dump($_SESSION);
			header("Location: index.php");
			exit();
		} else {
			echo "<p class='echo'> Incorrect User or Password";
		}
	} else {
		echo "<p class='echo'> Error querying the database: " . mysqli_error($conn);
	}

	mysqli_close($conn);
}
?>
</div>
<?php 
	include "test.php";
printFooter() 
?>

</body>
</html>
