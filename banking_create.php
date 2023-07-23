<html>
<head>
	<title>Add Accounts</title>
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
	<h2>Account Details</h2>
	<form action="banking_create.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="account_holder_name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="account_holder_email"></td>
			</tr>
			<tr>
				<td>Mobile Number</td>
				<td><input type="text" name="account_holder_mobilenum"></td>
			</tr>
			<tr>
				<td>Account Number</td>
				<td><input type="text" name="account_number"></td>
			</tr>
			<tr>
				<td>Account Type</td>
				<td><input type="radio" id="Savings" name="account_type" value="Savings"></td>
				<td><label for = "Savings">Savings</label><br></td>
				<td><input type="radio" id="Checking" name="account_type" value="Checking"></td>
				<td><label for = "Checking">Checking</label><br></td>
				<td><input type="radio" id="Others" name="account_type" value="Others"></td>
				<td><label for = "Others">Others</label><br></td>
			</tr>
			<tr>
				<td>Date Created</td>
				<td><input type="Date" name="account_datecreated"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="Address"></td>
			</tr>
			<tr>
				<td>Balance</td>
				<td><input type="text" name="remaining_balance"></td>
			</tr>
			<tr>
				<td>Notes</td>
				<td><input type="text" name="notes"></td>
			</tr>
			<tr>				
				<td><input type="submit" name="Submit" value="Add"></td>
				<td><a href="admin_banking.php">Go Back</a></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
		$title = $_POST['title'];
		$account_holder_name = $_POST['account_holder_name'];
		$account_holder_email = $_POST['account_holder_email'];
		$account_holder_mobilenum = $_POST['account_holder_mobilenum'];
		$account_number = $_POST['account_number'];
		$account_type = $_POST['account_type'];
		$account_datecreated = $_POST['account_datecreated'];
		$Address = $_POST['Address'];
		$remaining_balance = $_POST['remaining_balance'];
		$notes = $_POST['notes'];

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
		$result = mysqli_query($conn, "INSERT INTO bankaccount_information (title,account_holder_name,account_holder_email,account_holder_mobilenum,account_number,account_type,account_datecreated,Address, remaining_balance, notes) VALUES('$title','$account_holder_name','$account_holder_email','$account_holder_mobilenum','$account_number','$account_type','$account_datecreated', '$Address', $remaining_balance,  '$notes')");

		// Show message when user added
		echo "Account added successfully. <a href='admin_banking.php'>View Accounts</a>";
	}
	?>
</body>
</html>