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

// Get id from URL to delete that user
$application_id = $_GET['application_id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM insurance_applications WHERE application_id=$application_id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:admin_insurance.php");
?>