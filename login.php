<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /*body {
            margin: 0;
            padding: 0;
            font-family: "Arial Rounded MT Bold", sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            padding: 30px;
            background-color: #b19cd9;
            color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-left: 180px;
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

        .container input[type="email"],
        .container input[type="password"] {
            width: 93%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .container input[type="submit"] {
            background-color: #8e44ad;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .container input[type="submit"]:hover {
            background-color: #663399;
        }
        .signup-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .signup-link a {
            color: #8e44ad;
            text-decoration: none;
        }

        .signup-link a:hover {
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
        <h1>Login</h1>
        <form action="process_login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Log In">
        </form>
        <div class="signup-link">
            <p>No account yet? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
    </div>
</body>
</html>
