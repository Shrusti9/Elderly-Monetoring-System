<?php 
    include 'db_conn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url(adl.png);
            background-repeat: no-repeat;
/*            background-size: cover;*/
            background-color: #d1c3a3;


        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
/*            transform: translate(-50%, -50%);*/
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
            width: 20EM;
            height: 20EM;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
        }

        .submit-btn{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }


        .submit-btn:hover{
            background-color: blue;
            color: white;
        }

        .signup-link {
            
            color: blue;
            position: relative;
            top: 20PX;
            text-decoration: none;
            display: block;
        }

        .forgot-password {
            margin-top: 10px;
        }

        .forgot-password a {
            color: blue;
            text-decoration: none;
        }

        #bb{
            position: relative;
            top: 5em;
            width: 30%;
            left: 53em;
        }

    </style>
</head>
<body>
    <img src="add.png" id="bb">
    <div class="container">
        <h1>Welcome back!Login</h1>
        <form method="POST" action="login.php">
            <input type="text" name="phone" placeholder="Mobile number" ><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit" class="submit-btn">Login</button><br>
        </form>
        <div class="forgot-password">
            <a href="forgot_password.php">Forgot password?</a>
        </div>
        <a href="register.php" class="signup-link">Not registered? Sign up?</a>
    </div>
</body>
</html>

<?php
    // Disable error reporting to suppress errors
    error_reporting(0);
    ini_set('display_errors', 0);

    if (isset($_POST['phone']) && isset($_POST['password'])) {


        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $query = "SELECT * FROM reg WHERE phone = '$phone' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $userid = $row['id'];
            $location = 'home.php?id=' . $userid;
            header("Location: $location");
        } else {
            // Log the error to console
            echo "<script>alert('Invalid phone number or password.');</script>";
        }
    } else {
        // Log the error to console
        echo "<script>console.error('Please enter both phone number and password.');</script>";
    }
?>
