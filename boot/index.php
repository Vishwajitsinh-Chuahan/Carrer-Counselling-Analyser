<?php
session_start();
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/32e0d6aa8f.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="nav.css">
     <title>Login Page</title>
     <style>
         body {
             text-align: center;
             font-family: Verdana, Geneva, Tahoma, sans-serif;
             margin: 50px;
             /* background: linear-gradient(to right, #ad9cab, #09090a); */
               /* background-color:#d9e7f4; */
               background-color:#8d9496;
            }
 
         .container
          {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            /* background: linear-gradient(to bottom right, #5f9ea0, #49767b); */
            /* background:#bfb7ad; */
            background:#bfbfbf;

            border-radius: 8px;
            box-shadow:
  2.8px 2.8px 2.2px rgba(0, 0, 0, 0.02),
  6.7px 6.7px 5.3px rgba(0, 0, 0, 0.028),
  12.5px 12.5px 10px rgba(0, 0, 0, 0.035),
  22.3px 22.3px 17.9px rgba(0, 0, 0, 0.042),
  41.8px 41.8px 33.4px rgba(0, 0, 0, 0.05),
  100px 100px 80px rgba(0, 0, 0, 0.07)
;
        }
 
 
         h2 {
             text-align: center;
             color: #260562;
             margin-top: 20px;
             font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
         }
 
         label {
             text-align: left;
             display: block;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
             margin: 10px 0 5px; /* Adjusted margin */
             color: #010106;
         }
 
         input {
             width: 100%;
             padding: 10px;
             margin-bottom: 10px;
             box-sizing: border-box;
             /* border: 1px solid gray; */
             border: 1px solid white;
            background-color:white;
             border-radius: 4px;
         }
 
         .input-icon {
             position: relative;
         }
 
         .input-icon i {
             position: absolute;
             top: 60%;
             left: 10px;
             transform: translateY(-50%);
             color: #555;
         }
 
         input[type="password"], input[type="text"] {
             padding-left: 30px; /* Adjusted padding */
         }
 
         .password-container {
             position: relative;
         }
 
         .toggle-password {
             position: absolute;
             top: 40%;
             right: 10px;
             transform: translateY(-50%);
             cursor: pointer;
         }
 
         input[type="submit"] {
             display: inline-block;
             padding: 12px 20px;
             margin-top: 20px;
             background-color: #2e3035;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
             color: #ffffff;
            font-size: medium;
            font-weight: bold;
            border-color:white;
             text-decoration: none;
             border-radius: 5px;
             text-align: center;
            border-color:white;
             transition: background-color 0.3s ease;
             cursor: pointer;
         }
 
         input[type="submit"]:hover {
             background-color: #afd7ff;
         }
 
         /* Media query for smaller screens */
         @media (max-width: 600px) {
             .container {
                 width: 90%;
             }
         }
     </style>
 </head>
 <body>
 
 <div class="container">
     <h2>Login</h2>
     <form action="#" method="post">
         <div class="input-icon">
             <i class="fas fa-user"></i>
             <label for="text">Username:</label>
             <input type="text" id="text" name="username">
         </div>
         <label for="password">Password:</label>
         <div class="password-container">
             <input type="password" id="password" name="password">
             <span class="toggle-password" onclick="togglePasswordVisibility()">
                 <i class="fas fa-eye-slash"></i><!-- Font Awesome eye icon used here, you can replace it with your preferred icon library -->
             </span>
         </div>
 
         <input type="submit" value="Login" name="login">
     </form>
 </div>
 
 <script>
     function togglePasswordVisibility() {
         const passwordInput = document.getElementById('password');
         const togglePasswordButton = document.querySelector('.toggle-password i');
 
         const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
         passwordInput.setAttribute('type', type);
 
         if (type === 'password') {
             togglePasswordButton.classList.remove('fa-eye');
             togglePasswordButton.classList.add('fa-eye-slash');
         } else {
             togglePasswordButton.classList.remove('fa-eye-slash');
             togglePasswordButton.classList.add('fa-eye');
         }
     }
 </script>
 
 </body>
 </html>
 <?php
include('connection.php');
ob_start(); // Start output buffering

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    // Check if any input is null
    if($username != '' && $password != '') {
        if (preg_match('/^(22cs[0-9]{3})$|^d23cs(0[9][6-9]|10[0-8])$/', $username)) {
            // Login attempt by student
            $check = "SELECT * FROM student WHERE student_id='$username' AND password='$password'";
            $query = mysqli_query($conn, $check);
            $rows = mysqli_num_rows($query);

            if($rows == 1) {
                $_SESSION['logedin'] = true;
                $_SESSION['account'] = $username;
                echo "<script>alert('You are logged in as $username'); setTimeout(function(){ window.location.href = 'form.php'; }, 0);</script>";
                exit();
            } else {
                echo "<script>alert('Invalid password.');</script>";
            }
        } elseif (preg_match('/^([a-zA-Z0-9_.-]+)@charusat\.ac\.in$/', $username)) {
            // Login attempt by faculty
            $check = "SELECT * FROM counsellor WHERE email='$username' AND password='$password'";
            $query = mysqli_query($conn, $check);
            $rows = mysqli_num_rows($query);

            if($rows == 1) {
                $_SESSION['logedin'] = true;
                $_SESSION['account'] = $username;
                echo "<script>alert('You are logged in as $username'); setTimeout(function(){ window.location.href = 'admin.php'; }, 0);</script>";

                exit();
            } else {
                echo "<script>alert('Invalid email or password.');</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password format.');</script>";
        }
    } else {
        echo "<script>alert('Field is empty! Please re-enter.');</script>";
    }
}
ob_end_flush(); // Flush the output buffer
?>
