<?php
session_start();
require_once "db_config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize user inputs
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];

    // Fetch user data from the database based on the provided email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $user_data = $result->fetch_assoc();
        $hashed_password = $user_data["password"];

        // Verify the provided password against the hashed password in the database
        if (password_verify($password, $hashed_password)) {
            // Password is correct; log in the user and set session variables
            $_SESSION["user_id"] = $user_data["id"];
            $_SESSION["first_name"] = $user_data["first_name"];
            $_SESSION["last_name"] = $user_data["last_name"];
            $_SESSION["email"] = $user_data["email"];
            $_SESSION["account_number"] = $user_data["account_number"];

            // Check if the email is "administrator" and redirect accordingly
            if ($email === "administrator@gmail.com") {
                header("Location: admin_dashboard.php");
                exit();
            } else {
                // Redirect to the dashboard or another page after successful login
                header("Location: dashboard.php");
                exit();
            }
        } else {
            // Incorrect password
            echo "Incorrect email or password. Please try again.";
        }
    } else {
        // User not found
        echo "User not found. Please check your email or sign up if you don't have an account.";
    }
}
?>
