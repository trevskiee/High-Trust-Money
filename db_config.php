<?php
// Replace these with your actual database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "hightrustmoney";

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
