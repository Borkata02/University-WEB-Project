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
		<h1>Registration</h1>
    <form action="register.php" method="post">
        <label for="identity_number">Faculty Number/Serial Number:</label>
        <input type="text" id="identity_number" name="identity_number" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
       <label for="user_type">Register as:</label>
        <select id="user_type" name="user_type" required>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>
        <br>

        <input type="submit" name="submit" class="submit" value="Register">
    </form>
    <span class="echo">Already have an accout? Try to <a href="login.php">Log in.</a> your account.  </span>
		
		

	<?php
	include "config.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $identity_number = isset($_POST['identity_number']) ? $_POST['identity_number'] : '';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];

    $insertUserQuery = "INSERT INTO users (identity_number, password, user_type) VALUES ('$identity_number', '$password', '$user_type')";
    
    if (mysqli_query($conn, $insertUserQuery)) {
       echo "  <p class='echo'> Added new User.<br>";
    } else {
        echo "<p class='echo'> Error registering user: " . mysqli_error($conn);
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