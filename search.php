<?php
	require_once "adminCheck.php";

	require_once "accounts/loginDB.php";
	
	// Close connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
	<header>
		<meta charset="utf-8">
		<title>Search Form</title>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=KoHo:wght@500&display=swap');
			body {
				font-family: 'KoHo', sans-serif;
				font-size: 18px;
				text-align: center;
				margin: 10px auto;
				width: 500px;
			}
			#searchbt{
				font-family: sans-serif;
				font-size: 20px;
				font-weight: bold;
				position: absolute;
				transform: translate(-50%, -50%);
				width: 170px;
				height: 40px;
				margin-top: 20px;
				letter-spacing: 1px;
				border: 3px solid #8C82FC;
				background: #fff;
				color: #8C82FC;
				border-radius: 40px;
				cursor: pointer;
				overflow: hidden;
				transition: all .35s;
			}
			#searchbt:hover{
				background: skyblue;
				color: #fff;
			}
			.brd{
				border: 1px solid black;
				border-radius: 15px;
				padding: 10px 0;
				margin: 20px 0;
			}
			.none1{
				display: none;
			}
			span{
				font-size: 14px;
				color: red;
			}
		</style>	
	</header>
	<body>
		<form action="searchDB.php" method="post">
			
			<div class="brd">
				Search Fisrt Name: <input type="text" placeholder="First name" name="search1"><br>
				<span>*You can leave it blank</span>
			</div>
			AND
			<div class="brd">
				Search Grind: <select name="search2">
				<option class="none1" value="" selected>--Select If Users Grind--</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
				<option value="">Empty</option>
				</select><br>
				<span>*Choose "Empty" to leave it blank</span>
			</div>
			AND
			<div class="brd">	
				Search Drink: <select name="search3">
				<option class="none1" value="" selected>--Select How Users Drink--</option>
				<option value="Sugar">Sugar</option>
				<option value="Cream">Cream</option>
				<option value="">Empty</option>
				</select><br>
				<span>*Choose "Empty" to leave it blank</span>
			</div>
			
			<input type = "submit" value="Search" id="searchbt">
		</form>
	</body>
</html>