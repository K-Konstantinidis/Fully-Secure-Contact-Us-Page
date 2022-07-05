<?php
	ini_set('display_errors', 0);
	
	/* Database credentials. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	
	// Create connection
	$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);
	// Check connection
	if($mysqli === false){
		die("ERROR: Failed to connect to MySQL. " . $mysqli->connect_error);
	}
	
	// Create database if it doesn't exist
	$sql = "CREATE DATABASE IF NOT EXISTS usersdb";
	
	if ($mysqli->query($sql) !== TRUE) {
		echo "Error creating database: " . $mysqli->error . "<br>";
	}
	
	// Create table to store users/admins if it doesn't exist
	$mysqli->select_db("usersdb");
	
	$sql = "CREATE TABLE IF NOT EXISTS users (
		id INT NOT NULL PRIMARY KEY ,
		username VARCHAR(50) NOT NULL UNIQUE,
		password VARCHAR(255) NOT NULL,
		created_at DATETIME DEFAULT CURRENT_TIMESTAMP
	)";
	
	if ($mysqli->query($sql) !== TRUE) {
		echo "Error creating table: " . $mysqli->error;
	}

	//Insert admin records in db 1 time
	$sql1 = "INSERT IGNORE INTO users (id, username, password) VALUES (1, 'admin1', 'admin123'), (2, 'admin2', 'admin321')";
		
	if ($mysqli->query($sql1) !== TRUE){
		echo "ERROR: " . $sql1 . "<br>" . $mysqli->error;
	}
?>