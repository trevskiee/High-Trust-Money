<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Health Care Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial Rounded MT Bold", sans-serif;
            background-color: #f9f9f9;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            background-color: #8e44ad;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            color: #fff;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            padding: 10px;
            border-bottom: 1px solid #663399;
        }

        .sidebar li a {
            color: #fff;
            text-decoration: none;
            display: block;
            font-size: 18px;
        }

        .sidebar li a:hover {
            background-color: #663399;
        }

        .content {
            margin-left: 253px;
        }

        .content h1 {
            font-size: 28px;
            color: #8e44ad;
        }

        /* Updated styles for Banking Form */
        .content h2 {
            color: #8e44ad;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .content form {
            background-color: #b19cd9;
            padding: 20px;
            border-radius: 5px;
        }

        .content form label {
            color: #fff;
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .content form input[type="text"],
        .content form input[type="number"],
        .content form textarea {
            width: 98%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .content form input[type="submit"] {
            background-color: #8e44ad;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .content form input[type="submit"]:hover {
            background-color: #663399;
        }

        .content form input[type="reset"] {
            background-color: #8e44ad;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .content form input[type="reset"]:hover {
            background-color: #663399;
        }

        /* Logout button */
        .logout-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #8e44ad;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #663399;
        }


        /*  Go Back Button      */
        .goback-btn {
            position: fixed;
            top: 60px;
            right: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #8e44ad;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .goback-btn:hover {
            background-color: #663399;
        }
        
        .option {
        padding: 10px;
        margin-bottom: 10px;
        background-color: white;
        cursor: pointer;
        border: 2px solid #B19CD9;
        border-radius: 10px;
        text-align: center;
        }

        .logo {
            /*position: fixed;
            top: 20px;
            left: 20px;
            width: 100px; /* Adjust the width as needed */
            /*height: auto;*/*/
            position: fixed;
            top: 20px;
            left: 20px;
            width: 160px;
            height: 100px;
            z-index: 9999;
            padding-left: 40px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img class="logo" src="hightrustmoneylogo.PNG" alt="High Trust Money">
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="banking.php">Banking</a></li>
            <li><a href="lending.php">Lending</a></li>
            <li><a href="insurance.php">Insurance</a></li>
            <li><a href="investment.php">Investment</a></li>
            <li><a href="payment.php">Payment</a></li>
        </ul>
    </div>

    <div class="content">
        <a href="dashboard.php"></a>
        <h1>Welcome to High Trust Money!</h1>
        <h2>Health Care</h2>
        <?php

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
            // Process the form submission and insert transaction details into the database
            $accountNumber = $_SESSION['account_number'];
            $category_option = $_POST["category_option"];
            $hc_option = $_POST["hc_option"];
            $amount = $_POST["amount"];
            $referencenum = $_POST["referencenum"];
            $name = $_POST["name"];
            $email = $_POST["email"];

            // Your database connection configuration
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hightrustmoney";

            // Create a connection to the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute the SQL statement to insert the transaction details
            $sql = "INSERT INTO payment (payment_user_num, category, option_selected, payment_amount, cref_num, name, email, payment_date) VALUES ('$accountNumber', '$category_option', '$hc_option', $amount, '$referencenum', '$name', '$email', NOW())";

            if ($conn->query($sql) === TRUE) {
                // Transaction successfully recorded in the database
                echo "<p>Confirmation: You have initiated a transfer from $accountNumber to $hc_option with the amount of $amount PHP. Thank you!</p>";
                
            } else {
                // Error occurred while inserting the transaction details
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();

            // Your database connection configuration
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hightrustmoney";

            // Create a connection to the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get the remaining balance from the 'bankaccount_information' table
            $balanceQuery = "SELECT remaining_balance FROM bankaccount_information WHERE account_number = '$accountNumber'";
            $balanceResult = mysqli_query($conn, $balanceQuery);

            if ($balanceResult) {
                $row = mysqli_fetch_assoc($balanceResult);
                $remainingBalance = $row['remaining_balance'];
            } else {
            echo "Error retrieving the remaining balance: " . mysqli_error($conn);
            exit;
            }

            $paymentID = mysqli_query($conn, "SELECT payment_id FROM payment");

            // Get the payment ID from the result set
            $row = mysqli_fetch_assoc($paymentID);
            $paymentIDValue = $row['payment_id'];

            // Use the fetched payment ID value in the SQL query
            $query = "SELECT payment_amount FROM payment WHERE payment_id = $paymentIDValue";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $paymentAmount = $row['payment_amount'];
                // Use the fetched payment amount as needed
                // Subtract the payment amount from the remaining balance in the 'bankaccount_information' table
                $updateQuery = "UPDATE bankaccount_information SET remaining_balance = $remainingBalance - $amount WHERE account_number = '$accountNumber'";

                if ($conn->query($updateQuery) === TRUE) {
                // Transaction successfully recorded in the database
                echo "<p>Payment amount subtracted from the remaining balance successfully.</p>";
                } else {
                // Error occurred while updating the remaining balance
                echo "Error updating the remaining balance: " . mysqli_error($conn);
                }
            } else {
            echo "Error retrieving the payment amount: " . mysqli_error($conn);}

            // Close the database connection
            $conn->close();
        } else {
            // Show the banking form
        ?>
        <form action="hcform.php" method="post">
            <label for="category_option">Category:</label>
            <input type="text" id="category_option" name="category_option" placeholder="Health Care">

            <label for="hc_option">Choose:</label>
            <select name="hc_option" id="hc_option">
            <option value="FORTUNE MEDICARE">FORTUNE MEDICARE</option>
            <option value="KONSULTAMD">KONSULTAMD</option>
            <option value="MEDICARD">MEDICARD</option>
            <option value="MEDICARE PLUS">MEDICARE PLUS</option>
            <option value="THE DOCTORS' HOSPITAL">THE DOCTORS' HOSPITAL</option>
            </select>

            <label for="amount">Amount (PHP):</label>
            <input type="number" id="amount" name="amount" required>

            <label for="referencenum">Account/Reference Number:</label>
            <textarea id="referencenum" name="referencenum" required></textarea>


            <label for="name">Name:</label>
            <textarea id="name" name="name"></textarea>

            <label for="email">Email:</label>
            <textarea id="email" name="email" required></textarea>

            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="Reset" value="Reset">
        </form>
        <?php
        }
        ?>
    </div>
    <a class="goback-btn" href="bills.php">Go Back</a>
    <a class="logout-btn" href="logout.php">Log Out</a>
</body>
</html>
