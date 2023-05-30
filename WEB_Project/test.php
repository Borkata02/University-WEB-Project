<?php
function printHeader() { ?>
	<html>
	<head>
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
						</div>
					</li>
					<li class="dropdown_third">
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
					<li class="dropdown_fifth">
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
					<li class="dropdown_sixth">
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