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
		<form method="POST" action="selectTopThree.php">
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
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_POST['submit'])){
		$discipline_id = $_POST['discipline'];

		 $disciplineQuery = "
    SELECT name
    FROM disciplines
    WHERE id = '$discipline_id'
    LIMIT 1
  ";

  	$disciplineResult = mysqli_query($conn, $disciplineQuery);

  	$disciplineRow = mysqli_fetch_assoc($disciplineResult);
    $disciplineName = $disciplineRow['name'];

  echo "<p class='echo'> Discipline: $disciplineName <br>";
		$query = "
    SELECT s.name AS student_name, AVG(g.grade) AS average_score
    FROM Students s
    JOIN Grades g ON s.id = g.student_id
    WHERE g.discipline_id = '$discipline_id'
    GROUP BY s.id
    HAVING AVG(g.grade) >= 5.50
    ORDER BY AVG(g.grade) DESC
    LIMIT 3
  ";

  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {

    echo "<table class='table'>";
    echo "<tr class='tr'><th  class='th'>Student Name</th><th  class='th'>Average Score</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr  class='tr'><td  class='td'>" . $row['student_name'] . "</td><td  class='td'>" . number_format($row['average_score'], 2) . "</td></tr>";
    }
    echo "</table>";
  } else {
    echo "No students found.";
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