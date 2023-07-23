<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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
/*            padding-top: 30px;*/
            position: relative;
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

        /* Updated styles for High Trust Money section */
        .content h2 {
            color: #8e44ad;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
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
        <ul>
            <img class="logo" src="hightrustmoneylogo.PNG" alt="High Trust Money">
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
        <!-- <img class="logo" src="hightrustmoneylogo.PNG" alt="High Trust Money"> -->
     </a>
        <h1>Welcome to High Trust Money!</h1>
        <h2>About High Trust Money</h2>
        <p>
            High Trust Money is a modern financial institution that provides a range of financial services 
            to meet your banking, lending, insurance, and investment needs. We are committed to delivering 
            secure and reliable services to our valued customers.
        </p>
        <p>
            Whether you want to manage your accounts, apply for a loan, explore investment opportunities, 
            or protect your assets with insurance, High Trust Money has got you covered.
        </p>
        <p>
            With a focus on transparency and customer satisfaction, we strive to build lasting relationships 
            with our clients. Join us today and experience the convenience of modern banking with High Trust Money.
        </p>
    </div>

    <a class="logout-btn" href="logout.php">Log Out</a>
</body>
</html>
