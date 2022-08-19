<?php
	// Initialize the session
	session_start();
	 
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../Accounts/login.php");
		exit;
	}
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "FormRecords";
			
	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
	// Check connection
	if ($conn->connect_error) {
		header("location: noDatabase.php");
		exit;
	} 

	// define variables and set to empty values
	$coffeeErr = $first_nameErr = $last_nameErr = $emailErr = $phoneErr = $grindErr = $drinkErr = "";
	$coffee = $first_name = $last_name = $email = $phone = $message = $grind = $drink = $success = "";
	
	if (isset($_POST['save_select'])) {
		if (empty($_POST["menu"])) {
			$coffeeErr = "Coffee is required";
		} else {
			$coffee = test_input($_POST["menu"]);
		}
		
		if (empty($_POST["fname"])) {
			$first_nameErr = "First name is required";
		} else{
			$first_name = test_input($_POST["fname"]);
			// check if first name only contains letters and whitespace
			if(!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
				$first_nameErr = "Only letters and white space allowed";
			} 
		}
		
		if (empty($_POST["lname"])) {
			$last_nameErr = "Last name is required";
		} else {
			$last_name = test_input($_POST["lname"]); 
			// check if last name only contains letters and whitespace
			if(!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
				$last_nameErr = "Only letters and white space allowed";
			} 
		}
		
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			// check if email address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}			
		}
		
		if (empty($_POST["phone"])) {
			$phoneErr = "Phone is required";
		} else {
			$phone = test_input($_POST["phone"]);
		}
		
		if (empty($_POST["textarea"])) {
			$message = "";
		} else {
			$message = test_input($_POST["textarea"]);
		}
		
		if (empty($_POST["option"])) {
			$grindErr = "Grind is required";
		} else {
			$grind = test_input($_POST["option"]);
		}
		
		if (empty($_POST["option2"])) {
			$drinkErr = "Drink is required";
		}else {
			$drink = test_input($_POST["option2"]);
		}
		
		if(empty($coffeeErr)&& empty($first_nameErr)&& empty($last_nameErr)&& empty($emailErr)&& 
			empty($phoneErr)&& empty($grindErr)&& empty($drinkErr)) {
			$sql = "INSERT INTO records(Coffee,First_Name,Last_Name,Email,Phone_Number,Message,Grind,Drink) 
			VALUES ('$coffee','$first_name','$last_name','$email','$phone','$message','$grind','$drink')";	
				
			if ($conn->query($sql) === TRUE) {
				$success = 'success';
			}else {
				echo "There is no table to store your record." . "<br><br>" . "This means that you cannot insert a record right now." . "<br><br>" . "We are sorry for the inconvenience, please try again later.";
			}
		}else {
			$success = '';
			echo "Could not insert record! There is an error." . "<br><br>" . "Probably there are empty required fields." . "<br>" . $conn->error;
		}
	}	
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	// Close connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Dashboard - Client area</title>
		<link rel="stylesheet" href="../css/style.css"/>
	</head>
	<body>
		<div id="contact">
			<img id="img" src="../images/user.jpg" alt="a contact us photo" width="100%" height="250px;">
			<h1>Contact Us</h1>
		</div>
		<div id="hello">
			<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
		</div>
		
		<?php if ($success == "success") { ?>
			<div style="font-size:18px; text-align:center; color:green; font-weight:bold;"><?php echo 'Record Inserted Successfully'; ?></div>
			<?php
				$success == "";
			}
        ?>

		<h3>Fill this form</h3>
		<p class="error">* required field.</p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<div id="form">
				<fieldset>
					<legend>Select Your Coffee</legend>
						<div id="menu">
						<input type="textarea" id="textar" for="dropbtn" value="Your favorite coffee is " disabled>
							<select id="coffeeSelection" name="menu">
								<option id="none1" value="" selected>--Select Your Coffee--</option>
								<option <?php if (isset($coffee) && $coffee=="Espresso" && $success == '') {echo "selected";} ?> value="Espresso">Espresso</option>
								<option <?php if (isset($coffee) && $coffee=="Latte" && $success == '') {echo "selected";} ?> value="Latte">Latte</option>
								<option <?php if (isset($coffee) && $coffee=="Drip Coffee" && $success == '') {echo "selected";} ?> value="Drip Coffee">Drip Coffee</option>
								<option <?php if (isset($coffee) && $coffee=="French Press" && $success == '') {echo "selected";} ?> value="French Press">French Press</option>
							</select>
							<span class="error">* <?php echo $coffeeErr;?></span>
						</div>
				</fieldset>
				
				<br><br>
				<fieldset>
					<legend>Personal Information</legend>
						<div id="personalInfo">
							<label class="names" for="fname"> First Name:</label>
							<input type="text" placeholder="First name" id="fname" name="fname" size="25" value="<?php if (isset($first_name) && $success == '') {echo $first_name;} ?>">
							<span class="error">* <?php echo $first_nameErr;?></span>
							<br><br>
							
							<label class="names" for="lname"> Last Name:</label>
							<input type="text" placeholder="Last name" id="lname" name="lname" size="25" value="<?php if (isset($last_name) && $success == '') {echo $last_name;} ?>">
							<span class="error">* <?php echo $last_nameErr;?></span>
							<br><br>
							
							<label class="pers" for="email"> E-Mail:</label>
							<input type="email" placeholder="xxx@gmail.com" id="email" name="email" size="30" value="<?php if (isset($email) && $success == '') {echo $email;} ?>">
							<span class="error">* <?php echo $emailErr;?></span>
							<br><br>
							
							<label class="pers" for="phone"> Phone Number:</label>
							<input type="tel" placeholder="6912345780" id="phone" name="phone" size="11" value="<?php if (isset($phone) && $success == '') {echo $phone;} ?>">
							<span class="error">* <?php echo $phoneErr;?></span>
							
						</div>
				</fieldset>
				
				<br><br>
				<fieldset>
					<legend>Learn More</legend>
						<label for="textar1"> Tell us your coffee preparation methods:</label>
						<br>
						<textarea id="textar1" name="textarea" rows="4" cols="77"><?php if (isset($message) && $success == '') {echo $message;} ?></textarea>
						<br>
						
						<p>Do you grind your own beans? <span class="error">* <?php echo $grindErr;?></span></p>
						
						<div id="radio">
							<input type="radio" id="yes" name="option" value="Yes" <?php if (isset($grind) && $grind=="Yes" && $success == '') echo "checked";?>>
							<label id="lyes" for="yes">Yes</label><br>
							<input type="radio" id="no" name="option" value="No" <?php if (isset($grind) && $grind=="No" && $success == '') echo "checked";?>>
							<label id="lno" for="no">No</label><br><br>
						</div>
						
						<p>How do you drink your coffee? <span class="error">* <?php echo $drinkErr;?></span></p>
						
						<div id="radio">
							<input type="radio" id="sugar" name="option2" value="Sugar" <?php if (isset($drink) && $drink=="Sugar" && $success == '') echo "checked";?>>
							<label id="lsugar" for="sugar">With sugar</label><br>
							<input type="radio" id="cream" name="option2" value="Cream" <?php if (isset($drink) && $drink=="Cream" && $success == '') echo "checked";?>>
							<label id="lcream" for="cream">With cream</label><br><br>
						</div>
				</fieldset>
			</div>
			
			<div class="wrapper">
				<input type="submit" name="save_select" value="Submit" id="subbut">
			</div>
		</form>
		
		<p id="but">
			<a href="../Accounts/reset-password.php" id="reset">Reset Your Password</a>
			<a href="../Accounts/logout.php" id="signout">Sign Out</a>
		</p>
		
		<footer>
			<hr>
			<h3 id="Cp">Copyright 2021 | <a href="https://github.com/K-Konstantinidis" target="_blank">Site By: Konstantinidis</a></h3>
		</footer>
		
		<!--If the user refreshes the record will not resubmit-->
		<script>
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
		</script>	

	</body>
</html>