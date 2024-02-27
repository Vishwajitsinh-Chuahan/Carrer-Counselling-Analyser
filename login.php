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
               background-color:antiquewhite;
            }
 
         .container
          {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            /* background: linear-gradient(to bottom right, #5f9ea0, #49767b); */
            background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);

            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }

 
         h2 {
             text-align: center;
             color: #260562;
             margin-top: 20px;
             font-family: cursive;
         }
 
         label {
             text-align: left;
             display: block;
            font-family:cursive;
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
             background-color: #091c52dd;
            font-family:cursive;
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
             background-color: #0056b3;
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

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
  
    // Check if any input is null
    if($username!=''&&$password!='')
    {

    if (preg_match('/^(22cs[0-9]{3})$|^d23cs(0[9][6-9]|10[0-8])$/', $username))
    {    

          $check = "select * from student where student_id='$username' and password='$password'";
          $query=mysqli_query($conn,$check);
          $rows=mysqli_num_rows($query);

          if($rows==1)
          {
            $_SESSION['logedin']=true;
            $_SESSION['account']=$username;
             // Display alert message using JavaScript and redirec
             echo "<script>alert('You are logged in as $username'); setTimeout(function(){ window.location.href = 'form.php'; }, 0);</script>";
             exit();
          }
          else{
            echo "<script>alert('Invalid password.');</script>";
          }
    }else{
        echo "<script>alert('Username does not match the specified pattern. Please use 22csxxx or d23csyyy.');</script>";
    }
}
    else{
        echo "<script>alert('Field is empty! Please re-enter.');</script>";
    }
}
ob_end_flush(); // Flush the output buffer

?>
