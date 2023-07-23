<html>
<head>
	<title>Add Insurance Applications</title>
</head>
	<style>
		*{
            padding:0;
            margin:0;
        }
        body{
            font-family: Helvetica;
        }

		td a{
            padding: 1.25px 2.5px;
            border: 1px solid black;
            text-decoration: none;
        }
        td a:hover{
            background-color: gray;
            color: white;
        } 

        h2{
        	background-color: #8e44ad;
            color: white;
            padding: 5px;
        }
	</style>
<body>
	<h2>Insurance Applications</h2>
	<form action="insurance_create.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="full_name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phone_number"></td>
			</tr>
			<tr>
				<td>Insurance Type</td>
				<td><input type="radio" id="High Trust Life" name="insurance_type" value="High Trust Life"></td>
				<td><label for = "High Trust Life">High Trust Life</label><br></td>
				<td><input type="radio" id="High Trust Health" name="insurance_type" value="High Trust Health"></td>
				<td><label for = "High Trust Health">High Trust Health</label><br></td>
				<td><input type="radio" id="High Trust Vehicle" name="insurance_type" value="High Trust Vehicle"></td>
				<td><label for = "High Trust Vehicle">High Trust Vehicle</label><br></td>
				<td><input type="radio" id="High Trust Travel" name="insurance_type" value="High Trust Travel"></td>
				<td><label for = "High Trust Travel">High Trust Travel</label><br></td>
			</tr>
			<tr>
				<td>Application Date</td>
				<td><input type="Date" name="application_date"></td>
			</tr>
			<tr>				
				<td><input type="submit" name="Submit" value="Add"></td>
				<td><a href="admin_insurance.php">Go Back</a></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$insurance_type = $_POST['insurance_type'];
		$application_date = $_POST['application_date'];

		// Create database connection using config file
		// Your database connection configuration
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hightrustmoney";

		// Create a connection to the database
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		};

		// Insert user data into table
		$result = mysqli_query($conn, "INSERT INTO insurance_applications (full_name,email,phone_number,insurance_type,application_date) VALUES('$full_name','$email','$phone_number','$insurance_type','$application_date')");

		// Show message when user added
		echo "Application added successfully. <a href='admin_insurance.php'>View Accounts</a>";
	}
	?>
</body>
</html>