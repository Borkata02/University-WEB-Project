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
	if (!isset($_SESSION)) {
    session_start();
}
	include "test.php";
		printHeader() 
	?>
	<div class="main">
		<h3><span>WEB PROJECT</span> ABOUT</h3>
		<h1>UNIVERSITY.</h1>
		<h3>PRESENTED BY: <span>BORIS GEORGIEV</span></h3>
		<h4>NOTE: CREATE THE TABLES AS LISTED STARTING FROM TOP TO BOTTOM!</h4>
		<a href="#info">Assignment</a>
	</div>
	<div id="info">
		<img src="assignment.png" alt="" id="zoom-image">
	</div>
	<?php 
		 printFooter() 
	?>
	<script>
		var image = document.getElementById("zoom-image");

		image.onclick = function() {
			if (image.requestFullscreen) {
				image.requestFullscreen();
			} else if (image.webkitRequestFullscreen) {
				image.webkitRequestFullscreen();
			} else if (image.msRequestFullscreen) {
				image.msRequestFullscreen();
			}
		}
	</script>
</body>
</html>