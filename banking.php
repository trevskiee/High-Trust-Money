<?php
session_start();
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
}

// Fetch all users data from database
$result = $conn->query("SELECT * FROM bankaccount_information ORDER BY ba_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Account</title>
    <style type="text/css">

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

        .container table {
            border: 1px solid;
        }
        .content {
            margin-left: 250px;
            padding: 10px;
        }

        .content h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #8e44ad;
        }

        /* Updated styles for High Trust Money section */
        .content h2 {
            color: #8e44ad;
            font-size: 24px;
            margin-bottom: 3px;
        }

        .container {
            width: 300px;
            margin: 50px auto;
            padding: 10px;
        }
        .container tr th {
            padding: 5px;
            text-align: center;
        }

        .container tr:nth-child(even) {
            background-color: #8e44ad;
        }

        .container2 {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #B19CD9;
        }

        .container3 {
            align-items: center;
            width: 65%;
            margin: 50px auto;
            margin-left: 300px;
            padding: 5px;
            background-color: #B19CD9;
            border-bottom: 1px solid black;
        }

        .container3 th {
            padding: 3px;
            width: 10px;
        }

        .container3 table {
            border-collapse: separate;
            border-spacing: 10px; /* Adjust the value as per your preference */
            align-items: center;
        }

        .container4 {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #B19CD9;
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
    <h1>Welcome to High Trust Money!</h1>
    <h2>Bank Account Information</h2>
</div>

<div class="container">
    <h2>Account Details</h2>
    <table>
        <tbody>
        <tr>
            <th scope="row">Title:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['title'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">Account Holder Name:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['account_holder_name'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">Account Number:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['account_number'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">Account Type:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['account_type'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">Email:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['account_holder_email'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">Mobile Number:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['account_holder_mobilenum'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">Address:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['Address'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>

        <tr>
            <th scope="row">Date Account Created:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['account_datecreated'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>

        </tbody>
    </table>
</div>

<div class="container2">
    <!-- Add the account balance row -->
    <table>
        <tr>
            <th scope="row">Account Balance: PHP</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['remaining_balance'];
                    }
                } else {
                    echo "No Record Found";
                }
                ?>
            </td>
        </tr>
    </table>
</div>

<div class="container3">
    <h2>Transaction History</h2>
    <!-- Add the transaction table -->
    <table>
        <thead>
            <tr>
            <th>Category</th>
            <th>Company</th>
            <th>Amount Paid</th>
            <th>Customer Account/Reference Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Payment</th>
            </tr>
        </thead>

        <tbody>
        <?php
            $accountNumber = $_SESSION['account_number'];

            $query = "SELECT * FROM payment WHERE payment_user_num LIKE '%$accountNumber%'";
            $query_run = $conn->query($query);

            if ($query_run->num_rows > 0) {
                foreach ($query_run as $items) {
                    echo "<tr>";
                    echo "<td>".$items['category']."</td>";
                    echo "<td>".$items['option_selected']."</td>";
                    echo "<td>".$items['payment_amount']."</td>";
                    echo "<td>".$items['cref_num']."</td>";
                    echo "<td>".$items['name']."</td>";
                    echo "<td>".$items['email']."</td>";
                    echo "<td>".$items['payment_date']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No Record Found</td></tr>";
            }
        ?>
        </tbody>
        <table>
            <thead>
                <tr>
                <th>Type</th>
                <th>To Account</th>
                <th>Amount</th>
                <th>Purpose</th>
                <th>Date of Transaction</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $accountNumber = $_SESSION['account_number'];

            $query = "SELECT * FROM transactions WHERE from_accountnum LIKE '%$accountNumber%'";
            $query_run = $conn->query($query);

            if ($query_run->num_rows > 0) {
                foreach ($query_run as $items) {
                    echo "<tr>";
                    echo "<td>"."Bank Transfer"."</td>";
                    echo "<td>".$items['to_account']."</td>";
                    echo "<td>".$items['amount']."</td>";
                    echo "<td>".$items['purpose']."</td>";
                    echo "<td>".$items['transaction_date']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No Record Found</td></tr>";
            }
        ?>    
            </tbody>
        </table>
    </table>
</div>

<div class="container4">
    <!-- Add the notes row -->
    <table>
        <tr>
            <th scope="row">Additional Notes/Remainder:</th>
            <td>
                <?php
                $accountNumber = $_SESSION['account_number'];

                $query = "SELECT * FROM bankaccount_information WHERE account_number LIKE '%$accountNumber%'";
                $query_run = $conn->query($query);

                if ($query_run->num_rows > 0) {
                    foreach ($query_run as $items) {
                        echo $items['notes'];
                    }
                } else {
                    echo "<tr><td colspan='55'>No Record Found</td></tr>";
                }
                ?>
            </td>
        </tr>
    </table>
</div>

<a class="logout-btn" href="logout.php">Log Out</a>
</body>
</html>
