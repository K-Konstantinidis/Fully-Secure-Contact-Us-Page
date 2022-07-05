<?php
	require_once "..\adminCheck.php";
	
	/* Database credentials. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$servername = "localhost";
	$username = "root";
	$password = "";
			
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// Create database if not exists
	$sql = "CREATE DATABASE IF NOT EXISTS FormRecords";
	
	if ($conn->query($sql) === TRUE) {
		echo "Database either created successfully OR has already been created." . "<br><br>";
	} else {
		echo "Error creating database" . "<br>";
	}
	
	// Create table if not exists
	$conn->select_db("FormRecords");
	
	$sql = "CREATE TABLE IF NOT EXISTS records(
		Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		Coffee VARCHAR(50) NOT NULL,
		First_Name VARCHAR(50) NOT NULL,
		Last_Name VARCHAR(50) NOT NULL,
		Email VARCHAR(50) NOT NULL,
		Phone_Number VARCHAR(10) NOT NULL,
		Message VARCHAR(500),
		Grind VARCHAR(3) NOT NULL,
		Drink VARCHAR(15) NOT NULL
	)";
	
	if ($conn->query($sql) === TRUE) {
		echo "Table either created successfully OR has already been created.";
	} else {
		echo "Error creating table" . "<br>";
	}
	
	// Close connection
    $conn->close();
?>