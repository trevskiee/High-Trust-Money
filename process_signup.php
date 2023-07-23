<?php
require_once "db_config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize user inputs
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mobile_number = trim($_POST["mobile_number"]);
    $account_number = trim($_POST["account_number"]);
    $password = $_POST["password"];

    // Perform additional validation as needed

    // Assuming you have a function to securely hash the password (e.g., password_hash())
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save the user data to the database
    $insert_query = "INSERT INTO users (first_name, last_name, email, mobile_number, account_number, password)
                     VALUES ('$first_name', '$last_name', '$email', '$mobile_number', '$account_number', '$hashedPassword')";

    if ($conn->query($insert_query) === TRUE) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>
