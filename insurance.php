<!-- insurance.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Insurance Form</title>
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
        .content form input[type="email"],
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
            margin-top: 10px;
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
            margin-top: 10px;
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
        <a href="dashboard.php">
        <!-- <img class="logo" src="/htdocs/hightrustmoney/hightrustmoneylogo.PNG" alt="High Trust Money"> -->
        </a>
        <h1>Welcome to High Trust Money!</h1>
        <h2>Insurance Form</h2>
        <?php
        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
            // Validate the form data
            $full_name = validate_input($_POST["full_name"]);
            $email = validate_input($_POST["email"]);
            $phone_number = validate_input($_POST["phone_number"]);
            $insurance_type = $_POST["insurance_type"];

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

            // Prepare and execute the SQL statement to insert the insurance form data
            $sql = "INSERT INTO insurance_applications (full_name, email, phone_number, insurance_type, application_date) VALUES ('$full_name', '$email', '$phone_number', '$insurance_type', NOW())";

            if ($conn->query($sql) === TRUE) {
                // Insurance application successfully recorded in the database
                echo "<p>Confirmation: Your insurance application for '$insurance_type' has been submitted successfully! Thank you!</p>";
                echo "<p>Full Name: $full_name</p>";
                echo "<p>Email: $email</p>";
                echo "<p>Phone Number: $phone_number</p>";
                echo "\n";
                echo "A confirmation email will be sent to you shortly.";
            } else {
                // Error occurred while inserting the insurance form data
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        } else {
            // Show the insurance form
        ?>
        <form action="insurance.php" method="post">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>
            <br>

            <label for="insurance_type">Types of Insurance:</label>
            <select id="insurance_type" name="insurance_type" required>
                <option value="" disabled selected>Select an option</option>
                <option value="High Trust Life">High Trust Life</option>
                <option value="High Trust Health">High Trust Health</option>
                <option value="High Trust Vehicle">High Trust Vehicle</option>
                <option value="High Trust Travel">High Trust Travel</option>
            </select>
            <br>

            <input type="submit" name="submit" value="Apply">
            <input type="reset" name="Reset" value="Reset">
        </form>
        <?php
        }
        ?>
    </div>

    <a class="logout-btn" href="logout.php">Log Out</a>
</body>
</html>
