<?php
	require_once "..\adminCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Show Database</title>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=KoHo:wght@500&display=swap');
			table, th, td {
			  border: 1px solid black;
			  border-collapse: collapse;
			}
			.id{
				font-family: 'KoHo', sans-serif;
				font-size: 18px;
				text-decoration: underline;
				text-align: center;
				padding: 2px 3px;
			}
			.middle{
				text-align: center;
			}
		</style>
	</head>
	<body>
		<?php
			require_once "../Accounts/loginDB.php";
			
			$query = "SELECT * FROM records";
			
			if ($result = $conn->query($query)){
				if ($result->num_rows > 0) {
					
					echo '<table cellspacing="2" cellpadding="2"> 
						<tr> 
							<td class="id"> ID </td> 
							<td class="id"> Coffee </td> 
							<td class="id"> First Name </td> 
							<td class="id"> Last Name </td> 
							<td class="id"> Email </td> 
							<td class="id"> Phone </td> 
							<td class="id"> Message </td> 
							<td class="id"> Grind</td>
							<td class="id"> Drink </td>
						</tr>';
					
					/* fetch associative array */
					while ($row = $result->fetch_assoc()){
						$field1name = $row["Id"];
						$field2name = $row["Coffee"];
						$field3name = $row["First_Name"];
						$field4name = $row["Last_Name"];
						$field5name = $row["Email"];
						$field6name = $row["Phone_Number"];
						$field7name = $row["Message"];
						$field8name = $row["Grind"];
						$field9name = $row["Drink"];
						
						echo '<tr> 
								<td class="middle">'.$field1name.'</td> 
								<td>'.$field2name.'</td> 
								<td>'.$field3name.'</td> 
								<td>'.$field4name.'</td> 
								<td>'.$field5name.'</td>
								<td>'.$field6name.'</td> 
								<td>'.$field7name.'</td> 
								<td class="middle">'.$field8name.'</td> 
								<td class="middle">'.$field9name.'</td> 
							 </tr>';
					}
					echo "</table>";

					/* free result set */
					$result->free();
				}else{
					echo "0 records.";
				}
			}else{
				echo "Currently there is no table in database. Please try again later.";
			}
			// Close connection
			$conn->close();
		?>
	</body>
</html>