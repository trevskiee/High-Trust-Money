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
	$application_id = $_POST['application_id']; 
	$full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$phone_number=$_POST['phone_number'];
	$insurance_type=$_POST['insurance_type'];
	$application_date=$_POST['application_date'];

	// update user data
	$result = mysqli_query($conn, "UPDATE insurance_applications SET full_name='$full_name',email='$email',phone_number='$phone_number',insurance_type='$insurance_type' ,application_date='$application_date' WHERE application_id =$application_id");

	// Redirect to homepage to display updated user in list
	header("Location: admin_insurance.php");
} 
?>
<?php
// Display selected user data based on id
// Getting id from url
$application_id = $_GET['application_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM insurance_applications WHERE application_id=$application_id");

while($user_data = mysqli_fetch_array($result))
{
	$full_name = $user_data['full_name'];
	$email = $user_data['email'];
	$phone_number = $user_data['phone_number'];
	$insurance_type = $user_data['insurance_type'];
	$application_date = $user_data['application_date'];
}
?>
<html>
<head>
	<title>Update Insurance Application</title>
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
        <h2>Insurance Application</h2>
    </div>

	<form name="update Insurance Application" method="post" action="insurance_update.php">
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
				<td>Phone Number</td>
				<td><input type="text" name="phone_number" value=<?php echo $phone_number;?>></td>
			</tr>
			<tr>
				<td> Insurance Type </td>
				<td><input type="radio" id= "High Trust Life" name="insurance_type" value=<?php echo $insurance_type;?>></td>
				<td><label for = "High Trust Life">High Trust Life</label><br></td>
				<td><input type="radio" id= "High Trust Health" name="insurance_type" value=<?php echo $insurance_type;?>></td>
				<td><label for = "High Trust Health">High Trust Health</label><br></td>
				<td><input type="radio" id= "High Trust Vehicle" name="insurance_type" value=<?php echo $insurance_type;?>></td>
				<td><label for = "High Trust Vehicle">High Trust Vehicle</label><br></td>
				<td><input type="radio" id= "High Trust Travel" name="insurance_type" value=<?php echo $insurance_type;?>></td>
				<td><label for = "High Trust Travel">High Trust Travel</label><br></td>
			</tr>

			<tr>
				<td>Application Date</td>
				<td><input type="Date" name="application_date" value=<?php echo $application_date;?>></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
				<td><a href="admin_insurance.php">Go Back</a></td>
				<td><input type="hidden" name="application_id" value=<?php echo $_GET['application_id'];?>></td>
			</tr>
		</table>
	</form>
</body>
</html>