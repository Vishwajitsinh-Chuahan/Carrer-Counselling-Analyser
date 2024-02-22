<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <script src="https://kit.fontawesome.com/32e0d6aa8f.js" crossorigin="anonymous"></script> -->
  <title>Sign Up</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family:Verdana, Geneva, Tahoma, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      
      width: 300px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #007BFF;
      margin-top: 20px; 
    }

    label {
      display: block;
      margin: 10px 0 5px;
      color: #333;
    }
    
    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    input[type="submit"] {
      display: inline-block;
      padding: 12px 20px;
      margin-top: 20px;
      background-color: #007BFF;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      text-align: center;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    @media screen and (max-width: 480px) {
      .signup-container {
        width: 90%;
      }
    }
  </style>
</head>
<body>

  <div class="container">
  <form action="#" method="POST">  
  <h2>Sign Up</h2>
    
      <label for="text">Username:</label>
      <!-- <i class="fa-solid fa-circle-user"></i> -->
      <input type="text"  id="text" name="username" >
      

      <label for="password">Create Password:</label>
      <input type="password" id="password" name="password" >

      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="confirmPassword" >


      <div id="error-message"></div>


      <input type="submit" value="Sign Up" name="signup">
      Already have an account?<a href="login.php"> <u>Login here</u></a>

    </form>
  </div>

</body>
</html>
 
<?php
include("connection.php");

if(isset($_POST['signup']))
{
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $conpass = $_POST['confirmPassword'];
    
    // Check if any input is null
    if($user != '' && $pass != '' && $conpass != '')
    {
        // Check if the username matches the specified patterns
        if (preg_match('/^(22cs[0-9]{3})$|^d23cs(0[9][6-9]|10[0-8])$/', $user))
        {    
                     
                // Check if email already exists d23cs 096 to 108
                $query = "SELECT * FROM signup WHERE username='$user'";
                $result = mysqli_query($conn, $query);
                $num = mysqli_num_rows($result);

                if($num > 0) 
                {
                    echo "<script>alert('Username already exists.');</script>"; 
                }
                else
                {
                    // Check if password and confirm password match or not
                    if($pass == $conpass)
                    {

                        //then insert data into database
                        $query = "INSERT INTO signup VALUES('$user', '$pass', '$conpass')";
                        $data = mysqli_query($conn, $query);

                        if($data) {
                            echo "<script>alert('Registered successfully.');</script>";
                        } else {
                            echo "<script>alert('Registration failed (logical error).');</script>";
                        }
                    } 
                    else 
                    {
                        echo "<script>alert('Confirm Password is incorrect. Please re-enter.');</script>";
                    }
                }
        }
        else        
        {
                echo "<script>alert('Username does not match the specified pattern. Please use 22csxxx or d23csyyy.');</script>";
        }  
    }   
 else
    {
        echo "<script>alert('Field is empty! Please re-enter.');</script>";
    }
}
?>
