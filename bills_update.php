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
	$payment_id  = $_POST['payment_id ']; 
	$payment_user_num=$_POST['payment_user_num'];
	$category=$_POST['category'];
	$option_selected=$_POST['option_selected'];
	$payment_amount=$_POST['payment_amount'];
	$cref_num=$_POST['cref_num'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$payment_date=$_POST['payment_date'];

	// update user data
	$result = mysqli_query($conn, "UPDATE payment SET payment_user_num='$payment_user_num',category='$category',option_selected='$option_selected',payment_amount='$payment_amount' ,cref_num='$cref_num',name='$name', email = '$email', payment_date = '$payment_date' WHERE payment_id =$payment_id");

	// Redirect to homepage to display updated user in list
	header("Location: admin_bills.php");
} 
?>
<?php
// Display selected user data based on id
// Getting id from url
$payment_id = $_GET['payment_id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM payment WHERE payment_id=$payment_id");

while($user_data = mysqli_fetch_array($result))
{
	$payment_user_num = $user_data['payment_user_num'];
	$category = $user_data['category'];
	$option_selected = $user_data['option_selected'];
	$payment_amount = $user_data['payment_amount'];
	$cref_num = $user_data['cref_num'];
	$name = $user_data['name'];
	$email = $user_data['email'];
	$payment_date = $user_data['payment_date'];
}
?>
<html>
<head>
	<title>Update Bills Payment</title>
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
        <h2>Payment</h2>
    </div>

	<form name="update Account Information" method="post" action="bills_update.php">
		<table border="0">
			<tr>
				<td>User Number</td>
				<td><input type="text" name="payment_user_num" value=<?php echo $payment_user_num;?>></td>
			</tr>
			<tr>
				<td>Category</td>
				<td><input type="radio" id= "Electric Utilities" name="category" value=<?php echo $category;?>></td>
				<td><label for = "Electric Utilities">Electric Utilities</label><br></td>
				<td><input type="radio" id= "Water Utilities" name="category" value=<?php echo $category;?>></td>
				<td><label for = "Water Utilities">Water Utilities</label><br></td>
				<td><input type="radio" id= "Cable/Internet" name="category" value=<?php echo $category;?>></td>
				<td><label for = "Cable/Internet">Cable/Internet</label><br></td>
				<td><input type="radio" id= "Telecoms" name="category" value=<?php echo $category;?>></td>
				<td><label for = "Telecoms">Telecoms</label><br></td>
				<td><input type="radio" id= "Government" name="category" value=<?php echo $category;?>></td>
				<td><label for = "Government">Government</label><br></td>
				<td><input type="radio" id= "Health Care" name="category" value=<?php echo $category;?>></td>
				<td><label for = "Health Care">Health Care</label><br></td>
			</tr>
			<tr>
				<td>Option Selected</td>
				<td><input type="radio" id= "ANECO" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "ANECO">Electric Utilities:ANECO</label><br></td>
				<td><input type="radio" id= "BONI GAS" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "BONI GAS">Electric Utilities:BONI GAS</label><br></td>
				<td><input type="radio" id= "MERALCO" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "MERALCO">Electric Utilities:MERALCO</label><br></td>
				<td><input type="radio" id= "SOLECO" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "SOLECO">Electric Utilities:SOLECO</label><br></td>
				<td><input type="radio" id= "ZANECO" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "ZANECO">Electric Utilities:ZANECO</label><br></td>


				<td><input type="radio" id= "CDO WATER" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "CDO WATER">Water Utilities:CDO WATER</label><br></td>
				<td><input type="radio" id= "FILINVEST WATER" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "FILINVEST WATER">Water Utilities:FILINVEST WATER</label><br></td>
				<td><input type="radio" id= "HAPPY WELL" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "HAPPY WELL">Water Utilities:HAPPY WELL</label><br></td>
				<td><input type="radio" id= "MANILA WATER" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "MANILA WATER">Water Utilities:MANILA WATER</label><br></td>
				<td><input type="radio" id= "MAYNILAD" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "MAYNILAD">Water Utilities:MAYNILAD</label><br></td>



				<td><input type="radio" id= "CABLELINK" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "CABLELINK">Cable/Internet:CABLELINK</label><br></td>
				<td><input type="radio" id= "CIGNAL" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "CIGNAL">Cable/Internet:CIGNAL</label><br></td>
				<td><input type="radio" id= "CONVERGE ICT" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "CONVERGE ICT">Cable/Internet:CONVERGE ICT</label><br></td>
				<td><input type="radio" id= "GLOBE AT HOME" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "GLOBE AT HOME">Cable/Internet:GLOBE AT HOME</label><br></td>
				<td><input type="radio" id= "SKY FIBER" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "SKY FIBER">Cable/Internet:SKY FIBER</label><br></td>



				<td><input type="radio" id= "CRUZTELCO" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "CRUZTELCO">Telecoms:CRUZTELCO</label><br></td>
				<td><input type="radio" id= "EASTERN COMMUNICATIONS" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "EASTERN COMMUNICATIONS">Telecoms:EASTERN COMMUNICATIONS</label><br></td>
				<td><input type="radio" id= "GLOBE POSTPAID" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "GLOBE POSTPAID">Telecoms:GLOBE POSTPAID</label><br></td>
				<td><input type="radio" id= "PLDT" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "PLDT">Telecoms:PLDT</label><br></td>
				<td><input type="radio" id= "SMART COMMUNICATIONS" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "SMART COMMUNICATIONS">Telecoms:SMART COMMUNICATIONS</label><br></td>



				<td><input type="radio" id= "DFA" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "DFA">Government:DFA</label><br></td>
				<td><input type="radio" id= "LTFRB" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "LTFRB">Government:LTFRB</label><br></td>
				<td><input type="radio" id= "NBI" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "NBI">Government:NBI</label><br></td>
				<td><input type="radio" id= "PSA" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "PSA">Government:PSA</label><br></td>
				<td><input type="radio" id= "SOCIAL HOUSING FINANCE" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "SOCIAL HOUSING FINANCE">Government:SOCIAL HOUSING FINANCE</label><br></td>



				<td><input type="radio" id= "FORTUNE MEDICARE" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "FORTUNE MEDICARE">Health Care:FORTUNE MEDICARE</label><br></td>
				<td><input type="radio" id= "KONSULTAMD" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "KONSULTAMD">Health Care:KONSULTAMD</label><br></td>
				<td><input type="radio" id= "MEDICARD" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "MEDICARD">Health Care:MEDICARD</label><br></td>
				<td><input type="radio" id= "MEDICARE PLUS" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "MEDICARE PLUSE">Health Care:MEDICARE PLUS</label><br></td>
				<td><input type="radio" id= "THE DOCTORS' HOSPITAL" name="option_selected" value=<?php echo $option_selected;?>></td>
				<td><label for = "THE DOCTORS' HOSPITAL">Health Care:THE DOCTORS' HOSPITAL</label><br></td>
			</tr>
			<tr>
				<td>Amount</td>
				<td><input type="text" name="payment_amount" value=<?php echo $payment_amount;?>></td>
			</tr>
			<tr>
				<td>Customer/Reference Number</td>
				<td><input type="text" name="cref_num" value=<?php echo $cref_num;?>></td>
			</tr>

			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value=<?php echo $name;?>></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value=<?php echo $email;?>></td>
			</tr>
			<tr>
				<td>Payment Date</td>
				<td><input type="Date" name="payment_date" value=<?php echo $payment_date;?>></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
				<td><a href="admin_bills.php">Go Back</a></td>
				<td><input type="hidden" name="payment_id" value=<?php echo $_GET['payment_id'];?>></td>
			</tr>
		</table>
	</form>
</body>
</html>