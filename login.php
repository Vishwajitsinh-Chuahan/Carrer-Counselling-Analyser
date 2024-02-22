<php?
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
        
        body 
        { 
            text-align: center;
            font-family:Verdana, Geneva, Tahoma, sans-serif;       
            margin: 50px;
            background-color: #f2f2f2;
        }
        
        .container 
        {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        .password-container {
            position: relative;
        }

        input[type="password"] {
            width: calc(100% - 30px); /* Adjusted width to accommodate the eye icon */
        }

        .toggle-password {
            position: absolute;
            top: 40%;
            right: 25px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        h2 
        {
            text-align: center;
            color: #007BFF;
            margin-top: 20px; 
        }
        label
        {
            text-align: left;
            display: block;
            margin: 10px 15px 5px;
            color: #333;
        }
        input 
        {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid gray;
            border-radius: 4px;
        }


        input[type="submit"]
        {
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

        input[type="submit"]:hover 
        {
            background-color: #0056b3;
        }
    
        a.create-account
        {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 10px; /* Adjusted margin-top */
            background-color: #28a745; /* Green color */
            color: #fff;
            text-decoration: none; /* Remove underline */
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        a.create-account:hover 
        {
        
            background-color: #218838; /* Darker green on hover */
        }
        
        /* Media query for smaller screens */
        @media (max-width: 600px)
        {
                .container {
                    width: 90%;
                }
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form action="form.php" method="post">
        <label for="text">Username:</label>
        <input type="text" id="text" name="username" required>

        <label for="password">Password:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <span class="toggle-password" onclick="togglePasswordVisibility()">
            <i class="fa-regular fa-eye-slash"></i><!-- Font Awesome eye icon used here, you can replace it with your preferred icon library -->
            </span>
        </div>


        <input type="submit" value="Login" name="login">

        <a href="signuppage.php" class="create-account">Create an Account</a> 
    </form>

</div>

</body>
</html>

<?php
include('connection.php'); // Assuming this file includes your database connection details

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $pwd = $_POST['password'];

    // $query = "SELECT * FROM signup where email='$uname' and password='$pwd'";//it is present or not 
    // $data = mysqli_query($conn, $query);
    // $rows = mysqli_num_rows($data);

    //correct or not
    $check = "SELECT * FROM signup WHERE username='$uname'";
    $checkdata = mysqli_query($conn,$check);
    $rows = mysqli_num_rows($checkdata);
    $result=mysqli_fetch_assoc($checkdata);

    

    if ($rows == 0) {
        echo "<script>alert('Please sign up first.')</script>";
    }
    else if($result['password']!=$pwd)
    {
        echo "<script>alert('Password is incorrect')</script>";
    }
     else {
        //session banna
         $_SESSION['username']=$uname; //[ ke under ka name kuchbhi ho sakta he] = vala jisme hamne post se store kiya he vo ayega
        // Redirect to demo.php only if login is successful
        echo "<script>alert('Login successful!'); window.location='Personal_information.html';</script>";
    }
}
?>
