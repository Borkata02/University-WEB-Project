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
  <?php 
  include "test.php";
  printHeader() 
  ?>
  <div class="form">
    <h1>User Profile</h1>
    <div class="profile-info">
        <?php
                // session_start();

        if (!isset($_SESSION['user_type']) || !isset($_SESSION['identity_number'])) {

            header("Location: login.php");
            exit();
        }

        include "config.php";

        $user_type = $_SESSION['user_type'];
        $identity_number = $_SESSION['identity_number'];

        $sql = "";

        if ($user_type == 'student') {
            $sql = "SELECT students.*, majors.name AS major_name
            FROM students
            JOIN majors ON students.major_id = majors.id
            WHERE faculty_number = ?";
        } elseif ($user_type == 'teacher') {
            $sql = "SELECT teachers.*, titles.name AS title_name
            FROM teachers
            JOIN titles ON teachers.title_id = titles.id
            WHERE serial_number = ?";
        }

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $identity_number);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result) {

            $userData = $result->fetch_assoc();

            echo "<p>Name: " . $userData['name'] . "</p>";
            echo "<p>Email: " . $userData['email'] . "</p>";

            if ($user_type == 'student') {
                echo "<p>Major: " . $userData['major_name'] . "</p>";
                echo "<p>Course: " . $userData['course'] . "</p>";
            } elseif ($user_type == 'teacher') {
                echo "<p>Title: " . $userData['title_name'] . "</p>";
                echo "<p>Phone: " . $userData['phone'] . "</p>";
            }
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();

        $conn->close();
        ?>
    </div>
</div>
<?php 
printFooter() 
?>
</body>
</html>