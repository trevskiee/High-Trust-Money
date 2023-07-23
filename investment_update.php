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
	$investment_id = $_POST['investment_id']; 
	$full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$phone_number=$_POST['phone_number'];
	$investment_amount=$_POST['investment_amount'];
	$investment_duration=$_POST['investment_duration'];
	$investment_purpose=$_POST['investment_purpose'];
	$investment_date=$_POST['investment_date'];

	// update user data
	$result = mysqli_query($conn, "UPDATE investments SET full_name='$full_name',email='$email',phone_number='$phone_number',investment_amount='$investment_amount' ,investment_duration='$investment_duration',investment_purpose='$investment_purpose', investment_date = '$investment_date' WHERE investment_id =$investment_id");

	// Redirect to homepage to display updated user in list
	header("Location: admin_investment.php");
} 
?>
<?php
// Display selected user data based on id
// Getting id from url
$investment_id = $_GET['investment_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM investments WHERE investment_id=$investment_id");

while($user_data = mysqli_fetch_array($result))
{
	$full_name = $user_data['full_name'];
	$email = $user_data['email'];
	$phone_number = $user_data['phone_number'];
	$investment_amount = $user_data['investment_amount'];
	$investment_duration = $user_data['investment_duration'];
	$investment_purpose = $user_data['investment_purpose'];
	$investment_date = $user_data['investment_date'];
}
?>
<html>
<head>
	<title>Update Investment Application</title>
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
        <h2>Investment Application</h2>
    </div>

	<form name="update Account Information" method="post" action="investment_update.php">
		<table border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="full_name" value=<?php echo $full_name;?>></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value=<?php echo $email;?>></td>
			</tr>
			<tr>
				<td>Mobile Number</td>
				<td><input type="text" name="phone_number" value=<?php echo $phone_number;?>></td>
			</tr>
			<tr>
				<td>Amount</td>
				<td><input type="text" name="investment_amount" value=<?php echo $investment_amount;?>></td>
			</tr>

			<tr>
				<td>Duration</td>
				<td><input type="text" name="investment_duration" value=<?php echo $investment_duration;?>></td>
			</tr>
			<tr>
				<td>Purpose</td>
				<td><input type="text" name="investment_purpose" value=<?php echo $investment_purpose;?>></td>
			</tr>
			<tr>
				<td>Investment Date</td>
				<td><input type="Date" name="investment_date" value=<?php echo $investment_date;?>></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
				<td><a href="admin_investment.php">Go Back</a></td>
				<td><input type="hidden" name="investment_id" value=<?php echo $_GET['investment_id'];?>></td>
			</tr>
		</table>
	</form>
</body>
</html>