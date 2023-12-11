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
        <h1>Descending Average Score</h1>
        <form method="POST" action="selectDescending.php">
            <label for="specialty">Specialty:</label>
            <select name="specialty" id="specialty" required>
                <?php
                include "config.php";
                $selected_specialty_id = isset($_POST['specialty']) ? $_POST['specialty'] : null;

                $sql_select_majors = "SELECT id, name FROM majors";
                $result_majors = $conn->query($sql_select_majors);
                while ($row = $result_majors->fetch_assoc()) {
                    $selected = ($selected_specialty_id == $row['id']) ? 'selected' : '';
                    echo "<option value=\"" . $row['id'] . "\" $selected>" . $row['name'] . "</option>";
                }
                $conn->close();
                ?>
            </select><br>
            <input type="submit"  name="submit"  class="submit" value="Submit">
        </form>
        <?php
        include "config.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_POST['submit'])){ 
            $specialty = $_POST['specialty'];
            $disciplineQuery = "
            SELECT name
            FROM majors
            WHERE id = '$specialty'
            LIMIT 1
            ";

            $disciplineResult = mysqli_query($conn, $disciplineQuery);

            $disciplineRow = mysqli_fetch_assoc($disciplineResult);
            $disciplineName = $disciplineRow['name'];

            echo "<p class='echo'> Major: $disciplineName <br>";

            $sql = "SELECT s.name AS student_name, ROUND(AVG(g.grade), 2) AS average_score
            FROM students s
            JOIN grades g ON s.id = g.student_id
            JOIN disciplines d ON g.discipline_id = d.id
            WHERE s.major_id = $specialty
            GROUP BY s.id
            ORDER BY average_score DESC;";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<tr class='tr'><th class='th'>Student Name</th><th>Average Score</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='tr'>";
                    echo "<td class='td'>" . $row['student_name'] . "</td>";
                    echo "<td class='td'>" . $row['average_score'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo " <p class='echo'> No students found.";
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