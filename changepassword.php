<?php
session_start();
if(!(isset($_SESSION['logedin']))|| $_SESSION['logedin']!=true)
{
    header('Location:login.php');
    
}
else{
    $id=$_GET['id'];
}
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
             background-color:#cec2c2;
            }
            
            .container {
    width: 300px;
    margin: 100px auto;
    background-color: #fff;
    padding: 20px;
    /* Apply box shadow */
    box-shadow:
        2.8px 2.8px 2.28px rgba(0, 0, 0, 0.028),
        6.7px 6.7px 5.3px rgba(0, 0, 0, 0.028),
        12.5px 12.5px 10px rgba(0, 0, 0, 0.035),
        22.3px 22.3px 17.9px rgba(0, 0, 0, 0.042),
        41.8px 41.8px 33.4px rgba(0, 0, 0, 0.050),
        100px 100px 80px rgba(0, 0, 0, 0.075);
    /* Add border */
    /* border: 2px solid black; Black border with 2px width */
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
             background-color: #2c3e50; /* Dark blue color */
             font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
             color: #ffffff;
             font-size: medium;
             font-weight: bold;
             border-color:white;
             text-decoration: none;
             text-align: center;
             transition: background-color 0.3s ease;
             cursor: pointer;
         }
 
         input[type="submit"]:hover {
             background-color: #260562;
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
     <h3>Change Password</h3>
     <form action="#" method="post">
        
     <div class="input-icon">
             <i class="fa-solid fa-lock"></i>
             <label for="text">Old Password:</label>
             <input type="password" id="text" name="oldpassword">
         </div>
         <div class="input-icon">
         <i class="fa-solid fa-lock"></i>
         <label for="text">New Password:</label>
             <input type="password" id="text" name="newpassword">
         </div>
         <div class="input-icon">
             <i class="fa-solid fa-lock"></i>
             <label for="text">Confirm Password</label>
             <input type="password" id="text" name="confirmpassword">
         </div>

         <input type="submit" value="Continue" name="continue">

     </form>
 </div>
 
 </body>
 </html>


 <?php
include('connection.php');
ob_start(); // Start output buffering

if(isset($_POST['continue'])) {

    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if (empty($oldpassword) || empty($newpassword) || empty($confirmpassword)) {
        echo "<script>alert('Please fill in all fields.')</script>";
    }
    else if(strlen($newpassword)<5 || strlen($newpassword)>16 || strlen($confirmpassword)<5 || strlen($confirmpassword)>16){
        echo "<script>alert('Password length should be between 5 to 16 characters.')</script>";
    }
    else if($newpassword == $oldpassword){
        echo "<script>alert('New password should be different from old password.')</script>";
    }else if($newpassword != $confirmpassword)
    {
        echo "<script>alert('New password and confirm password should be same.')</script>";

    }
    else{
        
        if(preg_match('/^([a-zA-Z0-9_.-]+)@charusat\.ac\.in$/', $id)){
        $sql1 = "UPDATE counsellor SET password = '$newpassword' WHERE email = '$id' AND password = '$oldpassword'";
        }else{
            $sql1 = "UPDATE student SET password = '$newpassword' WHERE student_id = '$id' AND password = '$oldpassword'";
        }
        $result=mysqli_query($conn, $sql1); 

        if($result){
    echo "<script>alert('Password Change successfully'); setTimeout(function(){ window.location.href = 'index.php'; }, 0);</script>";

        }
        else{
            echo "<script>alert('Incorrect old password.')</script>";
        }
    }}

ob_end_flush(); // Flush the output buffer
?>
