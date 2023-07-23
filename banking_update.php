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
	$ba_id = $_POST['ba_id']; 
	$title=$_POST['title'];
	$account_holder_name=$_POST['account_holder_name'];
	$account_holder_email=$_POST['account_holder_email'];
	$account_holder_mobilenum=$_POST['account_holder_mobilenum'];
	$account_number=$_POST['account_number'];
	$account_type=$_POST['account_type'];
	$account_datecreated=$_POST['account_datecreated'];
	$Address=$_POST['Address'];
	$remaining_balance=$_POST['remaining_balance'];
	$notes=$_POST['notes'];


	// update user data
	$result = mysqli_query($conn, "UPDATE bankaccount_information SET title='$title',account_holder_name='$account_holder_name',account_holder_email='$account_holder_email',account_holder_mobilenum='$account_holder_mobilenum' ,account_number='$account_number',account_type='$account_type', account_datecreated = '$account_datecreated', Address = '$Address', remaining_balance = '$remaining_balance', notes = '$notes' WHERE ba_id =$ba_id");

	// Redirect to homepage to display updated user in list
	header("Location: admin_banking.php");
} 
?>
<?php
// Display selected user data based on id
// Getting id from url
$ba_id = $_GET['ba_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM bankaccount_information WHERE ba_id=$ba_id");

while($user_data = mysqli_fetch_array($result))
{
	$title = $user_data['title'];
	$account_holder_name = $user_data['account_holder_name'];
	$account_holder_email = $user_data['account_holder_email'];
	$account_holder_mobilenum = $user_data['account_holder_mobilenum'];
	$account_number = $user_data['account_number'];
	$account_type = $user_data['account_type'];
	$account_datecreated = $user_data['account_datecreated'];
	$Address = $user_data['Address'];
	$remaining_balance = $user_data['remaining_balance'];
	$notes = $user_data['notes'];
}
?>
<html>
<head>
	<title>Update</title>
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
        <h2>Account Information</h2>
    </div>

	<form name="update Account Information" method="post" action="banking_update.php">
		<table border="0">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title" value=<?php echo $title;?>></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="account_holder_name" value=<?php echo $account_holder_name;?>></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="account_holder_email" value=<?php echo $account_holder_email;?>></td>
			</tr>
			<tr>
				<td>Mobile Number</td>
				<td><input type="text" name="account_holder_mobilenum" value=<?php echo $account_holder_mobilenum;?>></td>
			</tr>
			<tr>
				<td>Account Number</td>
				<td><input type="text" name="account_number" value=<?php echo $account_number;?>></td>
			</tr>
			<tr>
				<td>Account Type</td>
				<td><input type="radio" id= "Savings" name="account_type" value=<?php echo $account_type;?>></td>
				<td><label for = "Savings">Savings</label><br></td>
				<td><input type="radio" id= "Checking" name="account_type" value=<?php echo $account_type;?>></td>
				<td><label for = "Checking">Checking</label><br></td>
				<td><input type="radio" id= "Other" name="account_type" value=<?php echo $account_type;?>></td>
				<td><label for = "Other">Other</label><br></td>
			</tr>

			<tr>
				<td>Date Created</td>
				<td><input type="Date" name="account_datecreated" value=<?php echo $account_datecreated;?>></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="Address" value=<?php echo $Address;?>></td>
			</tr>
			<tr>
				<td>Balance</td>
				<td><input type="text" name="remaining_balance" value=<?php echo $remaining_balance;?>></td>
			</tr>
			<tr>
				<td>Notes</td>
				<td><input type="text" name="notes" value=<?php echo $notes;?>></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
				<td><a href="admin_banking.php">Go Back</a></td>
				<td><input type="hidden" name="ba_id" value=<?php echo $_GET['ba_id'];?>></td>
			</tr>
		</table>
	</form>
</body>
</html>