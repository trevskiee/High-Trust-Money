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
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search Function for BANKING CRUD</title>
    <style >
        *{
            padding-bottom: 10px;
            margin: 0;
            box-sizing: border-box;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: black;
            text-align: center;
        }

        body .footer . cancelButtoncontainer button[type=cancel]{
          
          padding: 6px;
          margin: auto;
          font-size: 17px;
          border: none;
          cursor: pointer;
          text-align: center;
          position: fixed;
          display: flex;
          display: grid;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>Account Number</th>
                                    <th>Account Type</th>
                                    <th>Date Created</th>
                                    <th>Address</th>
                                    <th>Balance</th>
                                    <th>Notes</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    if(isset($_POST['search']))
                                    {
                                        $filtervalues = $_POST['search'];
                                        $query = "SELECT * FROM bankaccount_information WHERE ba_id LIKE '%$filtervalues%' OR title LIKE '%$filtervalues%' OR account_holder_name LIKE '%$filtervalues%' OR account_holder_email LIKE '%$filtervalues%' OR account_holder_mobilenum LIKE '%$filtervalues%' OR account_number LIKE '%$filtervalues%' OR account_type LIKE '%$filtervalues%' OR account_datecreated LIKE '%$filtervalues%' OR Address LIKE '%$filtervalues%' OR remaining_balance LIKE '%$filtervalues%' OR notes LIKE '%$filtervalues%'";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['ba_id']; ?></td>
                                                    <td><?= $items['title']; ?></td>
                                                    <td><?= $items['account_holder_name']; ?></td>
                                                    <td><?= $items['account_holder_email']; ?></td>
                                                    <td><?= $items['account_holder_mobilenum']; ?></td>
                                                    <td><?= $items['account_number']; ?></td>
                                                    <td><?= $items['account_type']; ?></td>
                                                    <td><?= $items['account_datecreated']; ?></td>
                                                    <td><?= $items['Address']; ?></td>
                                                    <td><?= $items['remaining_balance']; ?></td>
                                                    <td><?= $items['notes']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="cancelButtoncontainer">
             <form action="admin_banking.php" method="POST">
                <button type="cancel">Go Back</button>
            </form> 
        </div>
     </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>