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
        <h1>Average Score by Discipline</h1>
        <form method="POST" action="selectAverageDiscipline.php">
            <label for="discipline">Discipline:</label>
            <select name="discipline" id="discipline" required>
                <?php
                include "config.php";
                $selected_discipline_id = isset($_POST['discipline']) ? $_POST['discipline'] : null;

                $sql_select_disciplines = "SELECT id, name FROM disciplines";
                $result_disciplines = $conn->query($sql_select_disciplines);
                while ($row = $result_disciplines->fetch_assoc()) {
                    $selected = ($selected_discipline_id == $row['id']) ? 'selected' : '';
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
            $discipline = $_POST['discipline'];

            $disciplineQuery = "
            SELECT name
            FROM disciplines
            WHERE id = '$discipline'
            LIMIT 1
            ";

            $disciplineResult = mysqli_query($conn, $disciplineQuery);

            $disciplineRow = mysqli_fetch_assoc($disciplineResult);
            $disciplineName = $disciplineRow['name'];

            echo "<p class='echo'> Discipline: $disciplineName <br>";
            $query = "
            SELECT s.name AS student_name, ROUND(AVG(g.grade), 2) AS average_score
            FROM Students s
            JOIN Grades g ON s.id = g.student_id
            WHERE g.discipline_id = $discipline
            GROUP BY s.id
            ORDER BY average_score DESC
            ";

            $result = mysqli_query($conn, $query);

            if ($result) {
                $totalScore = 0;
                $totalStudents = mysqli_num_rows($result);
                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<tr class='tr'><th class='th'>Student Name</th><th class='th'>Average Score</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $student_name = $row['student_name'];
                        $average_Score = $row['average_score'];
                        echo "<tr class='tr'><td class='td'>$student_name</td><td class='td'>$average_Score</td></tr>";
                        $totalScore += $row['average_score'];
                    }

                    $averageScore = $totalScore / $totalStudents;
                    $averageScore = round($averageScore, 2);
                    echo "<tr class='tr'><th class='th'>Total Score of All Students</th><th class='th'>Total Number of Students</th><th class='th'>Average Score of All Students</th></tr>";
                    echo "<tr class='tr'><td class='td'>$totalScore</td><td class='td'>$totalStudents</td><td class='td'>$averageScore</td></tr>";
                    echo "</table>";
                }
            } else {
                echo "Error executing query: " . mysqli_error($conn);
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