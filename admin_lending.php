<?php
// Create database connection using config file
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
};

// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM loan_applications ORDER BY application_id ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan</title>
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
            .main{
                background-color:black;
                width:auto;
                height:100vh;
                background-position: center;
                background-size: cover;
            }
            .container{
                display: grid;
                grid-template-rows: 34px 1fr 1fr 1fr;
                grid-template-columns: 250px 1fr 1fr 1fr ;
            }
            
            .container3{
                background-color:white;
                grid-row: 2/ span 4;
                grid-column: 2 / span 4;
                padding:2%;
                font-family: Helvetica;
            }

            .container3_grid {
                display: grid;
                grid-template-rows: 1fr 1fr 1fr 33px;
                grid-template-columns: 1fr 1fr 1fr 125px;
            }
            .container3_1{
                grid-row: 1/ span 3;
                grid-column: 1 / span 4;
            }
            .container3_2{
                grid-row: 4/ span 4;
                grid-column: 1 / span 3;
                padding-top: 7px;
                padding-left: 13px;
            }

            .container3_3{
                grid-row: 4/ span 4;
                grid-column: 4 / span 4;
                padding-top: 7px;
                padding-left: 13px;

            }


            .table {
                border-collapse: collapse;
                width: 100%;
            }

            tr:nth-child(even){
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
            }

            tr th{  
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #8e44ad;
                color: white;border: 1px solid #ddd;
                padding: 8px;
            }

            tr td {
                border: 1px solid #ddd;
                padding: 8px;
            }
            td a:link, td a:visited {
                background-color: white;
                color: black;
                border: 1px solid black;
                padding: 5px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
            }

            td a:hover{
            background-color: #213F99;
            color: white;
            }

            input {
                width: 93%;
            }
            .new {
                width: 90%
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
    </style>
    
</head>
<body>

    <div class="sidebar">
    <img class="logo" src="hightrustmoneylogo.PNG" alt="High Trust Money">
    <ul>
        <li><a href="admin_dashboard.php">Home</a></li>
        <li><a href="admin_banking.php">Banking</a></li>
        <li><a href="admin_lending.php">Lending</a></li>
        <li><a href="admin_insurance.php">Insurance</a></li>
        <li><a href="admin_investment.php">Investment</a></li>
        <li><a href="admin_payment.php">Payment</a></li>
    </ul>
    </div>

    <div class="content">
        <h1>Welcome to High Trust Money!</h1>
        <h2>Loan Application</h2>
    </div>

    <div class = "main">
            <div class = "container">

                <div class="container3">
                    <div class = "container3_grid">
                        <div class = "container3_1">
                            <h1>Loan Applications</h1>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Amount</th>
                                        <th>Term</th>
                                        <th>Purpose</th>
                                        <th>File</th>
                                        <th>Application Date</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        while($user_data = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>".$user_data['application_id']."</td>";
                                            echo "<td>".$user_data['full_name']."</td>";
                                            echo "<td>".$user_data['email']."</td>";
                                            echo "<td>".$user_data['phone_number']."</td>";
                                            echo "<td>".$user_data['loan_amount']."</td>";
                                            echo "<td>".$user_data['loan_term']."</td>";
                                            echo "<td>".$user_data['purpose']."</td>";
                                            echo "<td>".$user_data['file']."</td>";
                                            echo "<td>".$user_data['application_date']."</td>";
                                            echo "<td><a href='lending_update.php?application_id=$user_data[application_id]'>Update</a> | <a href='lending_delete.php?application_id=$user_data[application_id]'>Delete</a></td></tr>";
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                                               
                        <div class = "container3_2">
                            <form action="lending_search.php" method="POST">   
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary">Search</button> 
                                    <input type="text" name="search" required value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" class="form-control" placeholder="Search data">
                                        
                                </div>
                            </form>  
                        </div>
                         
                        <div class = "container3_3">
                            <a href="lending_create.php">Add Loan Application</a><br/><br/>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
<a class="logout-btn" href="logout.php">Log Out</a>
</body>
</html>