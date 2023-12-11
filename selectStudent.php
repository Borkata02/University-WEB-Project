<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search Grades by Student</title>
</head>
<body>
    <?php 
    include "test.php";
    printHeader() 
    ?>
    <div class="form">
        <h1>Search Grades by Student</h1>
        <form method="POST" action="selectStudent.php">
            <label for="student">Student:</label>
            <select name="student" id="student" required>
                <?php
                include "config.php";

                $identity_number = $_SESSION['identity_number'];
                $user_type = $_SESSION['user_type'];

                if ($user_type == 'teacher') {
                    $sql_select_students = "SELECT id, name FROM students";
                } 

                else {
                    $sql_select_students = "SELECT id, name FROM students WHERE faculty_number = '$identity_number'";
                }

                $result_students = $conn->query($sql_select_students);
                while ($row = $result_students->fetch_assoc()) {
                    $selected = ($_POST['student'] == $row['id']) ? 'selected' : '';
                    echo "<option value=\"" . $row['id'] . "\" $selected>" . $row['name'] . "</option>";
                }
                $conn->close();
                ?>
            </select><br>

            <input type="submit" name="submit" class="submit" value="Submit">
        </form>
        <?php
        include "config.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_POST['submit'])){
            $student_id = $_POST['student'];

            $sql = "SELECT students.name AS student_name, disciplines.name AS discipline_name, grades.grade, grades.date
            FROM grades
            INNER JOIN students ON grades.student_id = students.id
            INNER JOIN disciplines ON grades.discipline_id = disciplines.id
            WHERE students.id = $student_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<tr class='tr'><th class='th'>Student Name</th><th class='th'>Average Score</th><th class='th'>Grade</th><th class='th'>Date</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $student_name = $row['student_name'];
                    $discipline_name = $row['discipline_name'];
                    $grade = $row['grade'];
                    $date = $row['date'];

                    echo "<tr class='tr'><td class='td'>$student_name</td><td class='td'>$discipline_name</td><td class='td'>$grade</td><td class='td'>$date</td></tr>";

                }
                echo "</table>";
            } else {
                echo " <p class='echo'> No grades found for the specified student.";
            }
        }
        $conn->close();
        ?>
    </div>
    <?php 
    printFooter() 
    ?>
</body>
</html>