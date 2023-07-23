<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        /*body {
            margin: 0;
            padding: 0;
            font-family: "Arial Rounded MT Bold", sans-serif;
            background-color: #f9f9f9;
        }*/

        /* Reset some default styles for consistency */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f2f2f2;
            color: #333;
        }

        /* Header styles */
        .header {
            background-color: #8e44ad;
            padding: 20px;
            color: #fff;
            text-align: center;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 18px;
        }

        /* Navigation bar styles */
        .navbar {
            background-color: #fff;
            padding: 10px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: #8e44ad;
            text-decoration: none;
            font-weight: bold;
            margin-left: 20px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        /* Main content styles */
        .content {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
/*            margin-left: 300px;*/
        }

        .content h1 {
            color: #8e44ad;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .content p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #b19cd9;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .container input[type="text"],
        .container input[type="number"],
        .container input[type="email"],
        .container input[type="password"],
        .container textarea {
            width: 98%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        .container input[type="submit"] {
            background-color: #8e44ad;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        .container input[type="submit"]:hover {
            background-color: #663399;
        }
        
        .login-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #8e44ad;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>High Trust Money</h1>
        <p>Your Trusted Financial Partner</p>
    </div>

    <div class="navbar">
        <a href="home.html">Home</a>
        <a href="service.html">Service</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
    </div>

    <div class="content">
    <div class="container">
        <h1>Sign Up</h1>
        <form action="process_signup.php" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile_number">Mobile Number:</label>
            <input type="tel" id="mobile_number" name="mobile_number" required>

            <label for="account_number">Account Number:</label>
            <input type="text" id="account_number" name="account_number" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Sign Up">
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
    </div>
</body>
</html>
