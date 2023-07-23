<html>
<head>
	<title>Add Payment</title>
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
	<h2>Payment</h2>
	<form action="bills_create.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>User No.</td>
				<td><input type="text" name="payment_user_num"></td>
			</tr>
			<tr>
				<td>Category</td>
				<td><input type="text" name="category"></td>
			</tr>
			<tr>
				<td>Option Selected</td>
				<td><input type="text" name="option_selected"></td>
			</tr>
			<tr>
				<td>Amount</td>
				<td><input type="text" name="payment_amount"></td>
			</tr>
			<tr>
				<td>Customer/Reference Number</td>
				<td><input type="text" name="cref_num"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Payment Date</td>
				<td><input type="Date" name="payment_date"></td>
			</tr>
			<tr>				
				<td><input type="submit" name="Submit" value="Add"></td>
				<td><a href="admin_bills.php">Go Back</a></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
		$payment_user_num = $_POST['payment_user_num'];
		$category = $_POST['category'];
		$option_selected = $_POST['option_selected'];
		$payment_amount = $_POST['payment_amount'];
		$cref_num = $_POST['cref_num'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$payment_date = $_POST['payment_date'];

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
		$result = mysqli_query($conn, "INSERT INTO payment (payment_user_num,category,option_selected,payment_amount,cref_num,name,email,payment_date) VALUES('$payment_user_num','$category','$option_selected','$payment_amount','$cref_num','$name','$email', '$payment_date'')");

		// Show message when user added
		echo "Payment added successfully. <a href='admin_bills.php'>View Accounts</a>";
	}
	?>
</body>
</html>