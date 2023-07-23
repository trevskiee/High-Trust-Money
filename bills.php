<!DOCTYPE html>
<html>
<head>
  <title>Pay Bills</title>
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

  .h1{
    text-align: center;
  }

  .optionSelect {
    align-content: center;
  }

  .option{
    margin-top: 20px;
    padding: 10px 20px;
    border: solid;
    border-radius: 10px;
    cursor: pointer;
    width: 100px;
    text-align: center;
    border-color: #8e44ad;
    background-color: white;
    color: #fff;
    margin-left: 45px;
  }
  .hidden {
  display: none;
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

  .billscontent {
    margin-left: 500px;
    margin-top: 50px;
    width: 300px;
    padding: 10px;
    background-color: #B19CD9;
    text-align: center;
  }

  .content {
            margin-left: 252px;
        }

  .content h1 {
            font-size: 28px;
            color: #8e44ad;
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

  <div class = "content">
        <a href="dashboard.php"></a>
        <h1>Welcome to High Trust Money!</h1>
  </div>

  <div class="billscontent">
  <h2>Select an Options</h2>
    <ul>
      <div class="option" ><a href="euform.php">Electric Utilities</a></div>
      <div class="option" ><a href="wuform.php">Water Utilities</a></div>
      <div class="option" ><a href="ciform.php">Cable/Internet</a></div>
      <div class="option" ><a href="tcform.php">Telecoms</a></div>
      <div class="option" ><a href="gvform.php">Government</a></div>
      <div class="option" ><a href="hcform.php">Health Care</a></div>
    </ul>
  </div>
  <a class="goback-btn" href="payment.php">Go Back</a>
  <a class="logout-btn" href="logout.php">Log Out</a>
</body>
</html>
