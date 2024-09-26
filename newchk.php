<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Checkup</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="modal.css"> <!-- Add modal CSS -->

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url("img3.jpg");
      background-size: cover;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: bold;
      color: #333;
      text-decoration: none;
    }

    .menu-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .menu-links li {
      margin-right: 20px;
    }

    .menu-links li:last-child {
      margin-right: 0;
    }

    .menu-links a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    .container {
      width: 300px;
      margin: 50px auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      position: relative;
      top: 10em;
    }

    .container label {
      display: block;
      margin-bottom: 10px;
      color: #333;
      font-weight: bold;
    }

    .container input {
      width: 15em !important; 
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .container .input-group {
      display: flex;
      justify-content: space-between;
    }

    .container .input-group input {
      width: calc(33.33% - 10px);
      margin-right: 10px;
    }

    .container input[type="submit"] {
      width: 100%;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .container input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .container input[type="submit"] {
      position: relative;
      left: 2.7em;
    }

    #graph-modal {
      display: none;
    }
  </style>
</head>
<body>

  <header>
    <nav class="navbar">
        <img src="img2.png" alt="">
        <a class="logo" href="#">Elderly Management System<span>.</span></a>
        <ul class="menu-links">
            <li><a href="project.html">Home</a></li>
            <li><a href="login.php">Sign-in</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="check.php">Check-Up</a></li>
        </ul>
    </nav>
  </header>

  <form action="#" method="post" id="health-form">
    <div class="container">
      <div class="input-group">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" required placeholder="Enter your age">
      </div>

      <div class="input-group">
        <label for="bpm">BPM</label>
        <input type="number" id="bpm" name="bpm" placeholder="Enter your BPM">
      </div>

      <div class="input-group">
        <label for="spo2">SPO2</label>
        <input type="number" id="spo2" name="spo2" required placeholder="Enter your SPO2">
      </div>

      <input type="submit" value="Submit"><br>
      <a href="graph.php" id="show-graph-link">Show Graph</a> <!-- Add link to show graph -->
    </div>
  </form>

  <script>
   const healthForm = document.getElementById("health-form");
const healthFeedback = document.getElementById("healthFeedback");
const showGraphLink = document.getElementById("show-graph-link");
const graphModal = document.getElementById("graph-modal");

healthForm.addEventListener("submit", function(event) {
    event.preventDefault();
    const age = parseInt(document.querySelector("#age").value);
    const bpm = parseInt(document.querySelector("#bpm").value);
    const spo2 = parseInt(document.querySelector("#spo2").value);

    if (age > 65) {
        if (bpm > 100 || spo2 < 95) {
            alert("Your health needs attention. Please consult a healthcare professional.");
            return; // Exit the function
        }
    } else {
        if (bpm < 60 || spo2 < 90 || spo2 > 110) {
            alert("Your health needs attention. Please consult a healthcare professional.");
            return; // Exit the function
        }
    }
});


        
  </script>

</body>
</html>
