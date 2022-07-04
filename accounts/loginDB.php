<?php
	ini_set('display_errors', 0);
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "FormRecords";
				
	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed." . "<br><br> There is no database. <br><br>Please create one and try again later.");
	}		
?>