<?php 
    include 'db_conn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url(adl.png);
/*            background-size: cover;*/
background-repeat: no-repeat;
background-color: #d1c3a3;

        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
            width: 20em;
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
        input[type="email"],
        input[type="password"]{
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .terms {
            text-align: left;
            margin-top: 10px;
        }

         .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        #bb{
            position: relative;
            top: 5em;
            width: 35%;
            left: 49em;
        }


    </style>
</head>
<body>
    <img src="add.png" id="bb">

    <div class="container">
        <h1>Sign Up</h1>
        <form method="POST" action="register.php">
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="phone" placeholder="Phone number" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="checkbox" id="terms" name="terms" required>
            <small for="terms">I agree to the terms and conditions</small><br>
            <button type="submit" class="submit-btn">Sign Up</button>
        </form>
        <div class="login-link">
            Already registered? <a href="login.php">Login</a>
        </div>
    </div>
</body>
</html>


<?php 
    include 'db_conn.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $terms = $_POST['terms'];

        // Password validation using JavaScript
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            echo "<script>alert('Password must contain at least 8 characters, including 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.');</script>";
            exit();
        }

        // Insert data into database if password validation is successful and terms are agreed
        if ($terms == "on") {
            // Prepare SQL statement
            $sql = "INSERT INTO reg (name, email, phone, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bind_param("ssss", $name, $email, $phone, $password);

            // Execute statement
            if ($stmt->execute()) {
                // Redirect to home page or any other desired page after successful signup
                header("Location: home.php");
                exit();
            } else {
                echo "<script>alert('Error: Unable to register user. Please try again later.');</script>";
            }
        } else {
            echo "<script>alert('Please agree to the terms and conditions.');</script>";
        }
    }
?>
