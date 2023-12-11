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
        <h1>Thesis</h1>
        <form method="POST" action="selectThesis.php">
            <label for="major">Major:</label>
            <select name="major" id="major" required>
                <?php
                include "config.php";
                $selected_major_id = isset($_POST['major']) ? $_POST['major'] : null;

                $sql_select_majors = "SELECT id, name FROM majors";
                $result_majors = $conn->query($sql_select_majors);
                while ($row = $result_majors->fetch_assoc()) {
                    $selected = ($selected_major_id == $row['id']) ? 'selected' : '';
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
            $major = $_POST['major'];

            $thesisQuery = "
            SELECT name
            FROM majors
            WHERE id = '$major'
            LIMIT 1
            ";

            $thesisResult = mysqli_query($conn, $thesisQuery);

            $thesisRow = mysqli_fetch_assoc($thesisResult);
            $thesisName = $thesisRow['name'];

            echo "<p class='echo'> Major: $thesisName <br> </p>";

            $query = "
            SELECT s.name AS student_name, AVG(g.grade) AS average_score
            FROM students s
            JOIN grades g ON s.id = g.student_id
            WHERE s.major_id = '$major'
            GROUP BY s.id
            ";

            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<tr class='tr'><th class='th'>Student Name</th><th class='th'>Average Score</th><th class='th'>Thesis</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $averageScore = $row['average_score'];
                    $passingGrade = ($averageScore >= 4.50) ? "Yes" : "No";
                    echo "<tr class='tr'><td class='td'>" . $row['student_name'] . "</td><td class='td'>" . number_format($averageScore, 2) . "</td><td class='td'>" . $passingGrade . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo " <p class='echo'> No students found. </p>";
            }

            $conn->close();
        }
        ?>
    </div>

    <?php 
    printFooter() 
    ?>
</body>
</html>