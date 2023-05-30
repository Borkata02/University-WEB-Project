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
		<form method="POST" action="selectDiscipline.php">
			<label for="discipline">Discipline:</label>
            <select name="discipline" id="discipline" required>
                <?php
                include "config.php";

                $sql_select_disciplines = "SELECT id, name FROM disciplines";
                $result_disciplines = $conn->query($sql_select_disciplines);
                while ($row = $result_disciplines->fetch_assoc()) {
                    echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                }
                $conn->close();
                ?>
            </select><br>

            <input type="submit" name="submit" class="submit" value="Submit">
        </form>
        <?php
        include "config.php";
        if(isset($_POST['submit'])){
          $discipline_id = $_POST['discipline'];
          $sql = "SELECT disciplines.name AS discipline_name, students.name AS student_name, grades.grade, grades.date
          FROM grades
          INNER JOIN disciplines ON grades.discipline_id = disciplines.id
          INNER JOIN students ON grades.student_id = students.id
          WHERE disciplines.id = $discipline_id";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr class='tr'><th class='th'>Discipline Name</th><th class='th'>Student Name</th><th class='th'>Grade</th><th class='th'>Date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $discipline_name = $row['discipline_name'];
                $student_name = $row['student_name'];
                $grade = $row['grade'];
                $date = $row['date'];

                echo "<tr class='tr'><td class='td'>$discipline_name</td><td class='td'>$student_name</td><td class='td'>$grade</td><td class='td'>$date</td></tr>";
            }
            echo "</table>";
        } else {
            echo " <p class='echo'> No grades found for the given discipline ID";
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