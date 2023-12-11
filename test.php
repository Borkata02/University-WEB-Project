<?php

if (!isset($_SESSION)) {
	session_start();
}

function printHeader() { ?>
	<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<script src="https://kit.fontawesome.com/ef8088f985.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<header>
			<div class="logo">
				<a href="index.php"><span class="arrow">></span>Tech<span class="name">Borko</span><span class="dot">.</span> </a>
			</div>
			<div class="nav">
				<ul>
					<li>
						<a href="connectionCreateToDB.php">Create DB</a>
					</li>
					<li class="dropdown">
						<a href="#">Create Tables</a>
						<div class="dropdown-content">
							<a href="createMajors.php">Majors</a>
							<a href="createTitles.php">Titles</a>
							<a href="createStudents.php">Students</a>
							<a href="createTeachers.php">Teachers</a>
							<a href="createDisciplines.php">Disciplines</a>
							<a href="createGrades.php">Grades</a>
							<a href="createUsers.php">Users</a>
						</div>
					</li>
					<li class="dropdown_third <?php echo ($_SESSION['user_type'] == 'student') ? 'hide-for-student' : ''; ?>">
						<a href="#">Insert</a>
						<div class="dropdown_content_third">
							<a href="insertMajors.php">Majors</a>
							<a href="insertTitles.php">Titles</a>
							<a href="insertStudents.php">Students</a>
							<a href="insertTeachers.php">Teachers</a>
							<a href="insertDisciplines.php">Disciplines</a>
							<a href="insertGrades.php">Grades</a>
						</div>
					</li>
					<li class="dropdown_fifth <?php echo ($_SESSION['user_type'] == 'student') ? 'hide-for-student' : ''; ?>">
						<a href="#">Delete</a>
						<div class="dropdown_content_fifth">
							<a href="deleteMajors.php">Majors</a>
							<a href="deleteTitles.php">Titles</a>
							<a href="deleteStudents.php">Students</a>
							<a href="deleteTeachers.php">Teachers</a>
							<a href="deleteDisciplines.php">Disciplines</a>
							<a href="deleteGrades.php">Grades</a>
						</div>
					</li>
					<li class="dropdown_sixth <?php echo ($_SESSION['user_type'] == 'student') ? 'hide-for-student' : ''; ?>">
						<a href="#">Edit</a>
						<div class="dropdown_content_sixth">
							<a href="editMajors.php">Majors</a>
							<a href="editTitles.php">Titles</a>
							<a href="editStudent.php">Students</a>
							<a href="editTeachers.php">Teachers</a>
							<a href="editDisciplines.php">Disciplines</a>
							<a href="editGrades.php">Grades</a>
						</div>
					</li>
					<li class="dropdown_fourth">
						<a href="#">Search Grades</a>
						<div class="dropdown_content_fourth">
							<a href="selectStudent.php">Student</a>
							<a href="selectDiscipline.php">Discipline</a>
						</div>
					</li>
					<li class="dropdown_second">
						<a href="#">Query</a>
						<div class="dropdown_content_second">
							<a href="selectTranscript.php">Academic Transcript</a>
							<a href="selectDescending.php">Average Score (Descending)</a>
							<a href="selectAverageDiscipline.php">Average Score (Disciplines)</a>
							<a href="SelectTopThree.php">Top 3 (Disciplines)</a>
							<a href="SelectThesis.php">Thesis</a>
						</div>
					</li>
					<div class="profile">
						<a href="profile.php"><i class="fa-solid fa-user"></i></a>
						<!-- <i class='fa-solid fa-plug-circle-xmark'></i> -->
						
						<?php
						if (isset($_SESSION['user_name'])) {
							$full_name = $_SESSION['user_name'];

							$name_parts = explode(" ", $full_name);

							$first_name = $name_parts[0];

							echo "<p>Hello, <span>$first_name</span></p>";
							// echo "<br>";
							// echo "";
						}
						?>
						<a href='logout.php' class="logout"><i class="fa-solid fa-right-from-bracket"></i></a>
					</div>
				</ul>

			</div>

		</header>

	<?php }
	function printFooter() { ?>
		<div id="footer">
			<div class="copy">
				<p>copyright &copy 2023.<span> TechBorko</span>. All Rights Reserved.</p>
			</div>
			<div class="design">
				<p> Designed with <span>love</span></i> by <span>borko</span></p>
			</div>
		</div>
	</body>
	</html>
<?php }

?>