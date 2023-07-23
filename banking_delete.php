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
$ba_id = $_GET['ba_id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM bankaccount_information WHERE ba_id=$ba_id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:admin_banking.php");
?>