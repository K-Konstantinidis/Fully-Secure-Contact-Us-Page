<?php
	require_once "..\adminCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Dashboard - Administrator area</title>
		<link rel="stylesheet" href="../css/style.css"/>
	</head>
	<body>
		<div id="contact">
			<img id="img" src="../images/admin.jpg" alt="a contact us photo" width="90%" height="300px;">
			<h1>Administrator</h1>
		</div>
		<div id="hello">
			<h1 class="my-5">Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Welcome back.</h1>
		</div>
		<br>
		
		<h3 style="margin-left: 10px;">Here are your options:</h3>
			
		<div id="buttons">
			<input type="button" onclick="location='createDB.php'" class="anchorButtons" value="Create a Database"/>
			<input type="button" onclick="location='showDB.php'" class="anchorButtons" value="Display Database Records"/>
			<input type="button" onclick="location='search.php'" class="anchorButtons" value="Search Database Records"/>
		</div>
		
		<p id="signbut">
			<a href="../Accounts\logout.php" id="signout1">Sign Out</a>
		</p>
		
		<footer>
			<hr>
			<h3 id="Cp">Copyright 2021 | <a href="https://github.com/K-Konstantinidis" target="_blank">Site By: Konstantinidis</a></h3>
		</footer>
	</body>
</html>