<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #d1c3a3;

    }

    .container {
      width: 300px;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .container label {
      display: block;
      margin-bottom: 10px;
    }

    .container input {
      width: calc(100% - 22px);
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .container input[type="password"] {
      position: relative;
    }

    .container input[type="password"] ~ .toggle-password {
      position: absolute;
      top: 50%;
      right: 6px;
      transform: translateY(-50%);
      cursor: pointer;
    }

    .container input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .container input[type="submit"]:hover {
      background-color: #0056b3;
    }

    	span{
    		position: relative;
    		right: 30em !important;
    		top: 22em !important;
    		}



  </style>
</head>
<body>
	
  <form>
    <div class="container">
      <label for="new-password">New Password</label>
      <input type="password" id="new-password" name="new-password">

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password">
      <span class="toggle-password" onclick="togglePassword('confirm-password')">Show</span>
      
      <input type="submit" value="Reset Password">
    </div>
  </form>
<img src="old.png">
  <script>
    function togglePassword(fieldId) {
      const field = document.getElementById(fieldId);
      const fieldType = field.getAttribute('type') === 'password' ? 'text' : 'password';
      field.setAttribute('type', fieldType);
    }


  </script>

</body>
</html>
