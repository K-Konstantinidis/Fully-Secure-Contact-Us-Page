<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Problem area</title>
		<style>
			#signout{
				font-family: sans-serif;
				font-size: 18px;
				text-decoration: none;
				border-radius: 20px;
				padding: 10px;
				margin-left: 15px;
				border: 3px solid #ff1a1a;
				color: white;
				background-color: #ff1a1a;
				border: 3px solid #00bfff;
				background-color: #00bfff;
				color: white;
				width: 15%;
			}
			div{
			text-align: center;
			}
			#signout:hover{
				background-color: #00ffff;
			}
		</style>
	</head>
	<body>
		<?php 
			echo "<p style='text-align:center;'>" ."There is no database to connect to." . "<br><br>" . 
			"This means that you cannot log-in to the form." . "<br><br>" . "We are sorry for the inconvenience, please try again later." . "</p>";
		?>
		<br><br>
		<div>
			<a href="accounts/logout.php" id="signout">Click to log-out</a>
		</div>
	</body>
</html>
