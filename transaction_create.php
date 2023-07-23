<html>
<head>
	<title>Add Transactions</title>
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
        	background-color:#8e44ad;
            color: white;
            padding: 5px;
        }
	</style>
<body>
	<h2>Transactions</h2>
	<form action="transaction_create.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>From (Name)</td>
				<td><input type="text" name="from_account"></td>
			</tr>
			<tr>
				<td>From (Account Number)</td>
				<td><input type="text" name="from_accountnum"></td>
			</tr>
			<tr>
				<td>To</td>
				<td><input type="text" name="to_account"></td>
			</tr>
			<tr>
				<td>Amount</td>
				<td><input type="text" name="amount"></td>
			</tr>
			<tr>
				<td>Purpose</td>
				<td><input type="text" name="purpose"></td>
			</tr>
			<tr>
				<td>Transaction Date</td>
				<td><input type="Date" name="transaction_date"></td>
			</tr>
			
			<tr>				
				<td><input type="submit" name="Submit" value="Add"></td>
				<td><a href="admin_banktransfer.php">Go Back</a></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
		$from_account = $_POST['from_account'];
		$from_accountnum = $_POST['from_accountnum'];
		$to_account = $_POST['to_account'];
		$amount = $_POST['amount'];
		$purpose = $_POST['purpose'];
		$transaction_date = $_POST['transaction_date'];

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
		$result = mysqli_query($conn, "INSERT INTO transactions (from_account,from_accountnum,to_account,amount,purpose,transaction_date) VALUES('$from_account','$from_accountnum','$to_account','$amount','$purpose','$transaction_date')");

		// Show message when user added
		echo "Transaction added successfully. <a href='admin_banktransfer.php'>View Accounts</a>";
	}
	?>
</body>
</html>