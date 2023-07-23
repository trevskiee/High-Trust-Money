<?php
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

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$transaction_id = $_POST['transaction_id']; 
	$from_account=$_POST['from_account'];
	$from_accountnum=$_POST['from_accountnum'];
	$to_account=$_POST['to_account'];
	$amount=$_POST['amount'];
	$purpose=$_POST['purpose'];
	$transaction_date=$_POST['transaction_date'];

	// update user data
	$result = mysqli_query($conn, "UPDATE transactions SET from_account='$from_account',from_accountnum='$from_accountnum',to_account='$to_account',amount='$amount' ,	purpose='$purpose',transaction_date='$transaction_date' WHERE transaction_id =$transaction_id");

	// Redirect to homepage to display updated user in list
	header("Location: admin_banktransfer.php");
} 
?>
<?php
// Display selected user data based on id
// Getting id from url
$transaction_id = $_GET['transaction_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM transactions WHERE transaction_id=$transaction_id");

while($user_data = mysqli_fetch_array($result))
{
	$from_account = $user_data['from_account'];
	$from_accountnum = $user_data['from_accountnum'];
	$to_account = $user_data['to_account'];
	$amount = $user_data['amount'];
	$purpose = $user_data['purpose'];
	$transaction_date = $user_data['transaction_date'];
}
?>
<html>
<head>
	<title>Update Transaction</title>
	<style>

        body{
            margin: 0;
            padding: 0;
            font-family: "Arial Rounded MT Bold", sans-serif;
            background-color: #f9f9f9;
        }


        .container1{
            background-color:#8e44ad;
            color: white;
            padding: 5px;
        }
        .container1_1{
            padding:10px;

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
    </style>
</head>

<body>
	
	<div class = "container1">
        <h2>Transfer from Bank</h2>
    </div>

	<form name="update Transaction" method="post" action="transaction_update.php">
		<table border="0">
			<tr>
				<td>From</td>
				<td><input type="text" name="from_account" value=<?php echo $from_account;?>></td>
			</tr>
			<tr>
				<td>From (Account No.)</td>
				<td><input type="text" name="from_accountnum" value=<?php echo $from_accountnum;?>></td>
			</tr>
			<tr>
				<td>To</td>
				<td><input type="text" name="to_account" value=<?php echo $to_account;?>></td>
			</tr>
			<tr>
				<td>Amount</td>
				<td><input type="text" name="amount" value=<?php echo $amount;?>></td>
			</tr>
			<tr>
				<td>Purpose</td>
				<td><input type="text" name="purpose" value=<?php echo $purpose;?>></td>
			</tr>
			<tr>
				<td>Transaction Date</td>
				<td><input type="Date" name="transaction_date" value=<?php echo $transaction_date;?>></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
				<td><a href="admin_banktransfer.php">Go Back</a></td>
				<td><input type="hidden" name="transaction_id" value=<?php echo $_GET['transaction_id'];?>></td>
			</tr>
		</table>
	</form>
</body>
</html>