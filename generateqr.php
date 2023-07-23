<!DOCTYPE html>
<html>
<head>
  <title>QR Code Generator</title>
  <style type="text/css">
  .body {
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
            text-align: center;
        }

        /* Updated styles for Banking Form */
        .content h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }

        .content button {
          margin-left: 450px;
        }

#qrCode {
  display: block;
  margin: 0 auto;
  margin-top: 20px;
  text-align: center;
  margin-left: 617px;
}

  button {
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;

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


  <div class = "content">
    <a href="dashboard.php"></a>
    <h1>Welcome to High Trust Money!</h1>
    <h1>QR Code Generator</h1>
    <div id="qrCode"></div>
    <button onclick="generateQRCode()">Generate</button>
    <a class="logout-btn" href="logout.php">Log Out</a>
  </div>

  <div class="option" style="margin-left: 1200px;  position: fixed;"><a href="payment.php">Go Back</a></div>
  
  <script src="qrcode.min.js"></script>
  <script>
    function generateQRCode() {
  var qrCodeDiv = document.getElementById("qrCode");
  qrCodeDiv.innerHTML = ""; // Clear any existing QR code

  var inputValue = prompt("Enter Account Number to generate QR code:");
  if (inputValue) {
    var qrCode = new QRCode(qrCodeDiv, {
      text: inputValue,
      width: 128,
      height: 128
    });
  }
}
  </script>
</body>
</html>
