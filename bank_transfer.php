<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Banking Form</title>
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
            margin-left: 250px;
            padding: 20px;
        }

        .content h1 {
            margin-bottom: 20px;
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
        <h2>Banking Form</h2>
        <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
        // Process the form submission and insert transaction details into the database
        $accountNumber = $_SESSION['account_number'];
        $from_account = $_POST["from_account"];
        $to_account = $_POST["to_account"];
        $amount = $_POST["amount"];
        $message = $_POST["message"];

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
        $sql = "INSERT INTO transactions (from_account, from_accountnum, to_account, amount, purpose, transaction_date) VALUES ('$from_account', '$accountNumber', '$to_account', $amount, '$message', NOW())";

        if ($conn->query($sql) === TRUE) {
            // Transaction successfully recorded in the database
            echo "<p>Confirmation: You have initiated a transfer from account $from_account to account $to_account with the amount of $amount PHP. Thank you!</p>";
            echo "<p>Purpose of Transfer: $message</p>";

            // Now we will transfer the amount to the recipient's account
            // Retrieve the remaining balance of the recipient
            $balanceQuery = "SELECT remaining_balance FROM bankaccount_information WHERE account_number = '$to_account'";
            $balanceResult = $conn->query($balanceQuery);

            if ($balanceResult) {
                $row = $balanceResult->fetch_assoc();
                $remainingBalance = $row['remaining_balance'];

                // Update the remaining balance of the recipient by adding the transferred amount
                $updateQuery = "UPDATE bankaccount_information SET remaining_balance = $remainingBalance + $amount WHERE account_number = '$to_account'";

                if ($conn->query($updateQuery) === TRUE) {
                    // Remaining balance updated successfully
                    echo "<p>The transferred amount has been added to the recipient's account successfully.</p>";

                    // Deduct the transferred amount from your remaining balance
                    $updateQuery = "UPDATE bankaccount_information SET remaining_balance = remaining_balance - $amount WHERE account_number = '$accountNumber'";

                    if ($conn->query($updateQuery) === TRUE) {
                        // Your remaining balance updated successfully
                        echo "<p>The transferred amount has been deducted from your account successfully.</p>";
                    } else {
                        // Error occurred while updating your remaining balance
                        echo "Error updating your remaining balance: " . $conn->error;
                    }
                } else {
                    // Error occurred while updating the recipient's remaining balance
                    echo "Error updating the recipient's remaining balance: " . $conn->error;
                }
            } else {
                // Error retrieving the remaining balance of the recipient
                echo "Error retrieving the remaining balance: " . $conn->error;
            }

            // Close the database connection
            $conn->close();
        } else {
            // Error occurred while inserting the transaction details
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Show the banking form
    ?>
        <form action="bank_transfer.php" method="post">
            <label for="from_account">Sender:</label>
            <input type="text" id="from_account" name="from_account" required>

            <label for="to_account">Receiver:</label>
            <input type="text" id="to_account" name="to_account" required>

            <label for="amount">Amount (PHP):</label>
            <input type="number" id="amount" name="amount" required>

            <label for="message">Purpose of Transfer:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" name="submit" value="Transfer">
            <input type="reset" name="Reset" value="Reset">
        </form>
        <?php
        }
        ?>
    </div>
    <a class="goback-btn" href="payment.php">Go Back</a>
    <a class="logout-btn" href="logout.php">Log Out</a>
</body>
</html>
