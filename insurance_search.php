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
    <title>Search Function for Insurance CRUD</title>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>Insurance Type</th>
                                    <th>Application Date</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    if(isset($_POST['search']))
                                    {
                                        $filtervalues = $_POST['search'];
                                        $query = "SELECT * FROM insurance_applications WHERE application_id LIKE '%$filtervalues%' OR full_name LIKE '%$filtervalues%' OR email LIKE '%$filtervalues%' OR phone_number LIKE '%$filtervalues%' OR insurance_type LIKE '%$filtervalues%' OR application_date LIKE '%$filtervalues%'";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['application_id']; ?></td>
                                                    <td><?= $items['full_name']; ?></td>
                                                    <td><?= $items['email']; ?></td>
                                                    <td><?= $items['phone_number']; ?></td>
                                                    <td><?= $items['insurance_type']; ?></td>
                                                    <td><?= $items['application_date']; ?></td>
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
             <form action="admin_insurance.php" method="POST">
                <button type="cancel">Go Back</button>
            </form> 
        </div>
     </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>