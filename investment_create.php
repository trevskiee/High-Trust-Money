<html>
<head>
	<title>Add Investment</title>
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
	<h2>Investment</h2>
	<form action="investment_create.php" method="post" name="form1">
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
				<td>Mobile Number</td>
				<td><input type="text" name="phone_number"></td>
			</tr>
			<tr>
				<td>Amount</td>
				<td><input type="text" name="investment_amount" ></td>
			</tr>

			<tr>
				<td>Duration</td>
				<td><input type="text" name="investment_duration" ></td>
			</tr>
			<tr>
				<td>Purpose</td>
				<td><input type="text" name="investment_purpose"></td>
			</tr>
			<tr>
				<td>Investment Date</td>
				<td><input type="Date" name="investment_date" ></td>
			</tr>
			<tr>				
				<td><input type="submit" name="Submit" value="Add"></td>
				<td><a href="admin_investment.php">Go Back</a></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$investment_amount = $_POST['investment_amount'];
		$investment_duration = $_POST['investment_duration'];
		$investment_purpose = $_POST['investment_purpose'];
		$investment_date = $_POST['investment_date'];

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
		$result = mysqli_query($conn, "INSERT INTO investments (full_name,	email,phone_number,investment_amount,investment_duration,investment_purpose,	investment_date) VALUES('$full_name','$email','$phone_number','$investment_amount','$investment_duration','$investment_purpose','$investment_date')");

		// Show message when user added
		echo "Investment Application added successfully. <a href='admin_investment.php'>View Accounts</a>";
	}
	?>
</body>
</html>