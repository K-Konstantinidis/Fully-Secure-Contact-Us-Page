<?php
	// Initialize the session
	session_start();
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: accounts/login.php");
		exit;
	}
	// Check if the logged in user is an admin, if not then log him out and redirect him to login page
	if($_SESSION["username"] !== 'admin1' && $_SESSION["username"] !== 'admin2'){
		// Unset all of the session variables
		$_SESSION = array();
	 
		// Destroy the session.
		session_destroy();
	 
		// Redirect to login page
		header("location: accounts/login.php");
		exit;
	}
?>