<?php
session_start();
if(!(isset($_SESSION['logedin']))|| $_SESSION['logedin']!=true)
{
    header('Location:login.php');
    
}else{
    include('connection.php');
   $id=$_GET['id'];
//    echo "id is".$id;
   $query= "SELECT * FROM personalinformation WHERE student_id='$id'";
   $data = mysqli_query($conn,$query);

   $result2=mysqli_fetch_assoc($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-6o7k3k9v2NJGB8b1K4d2uplZHZ/w7kO2e2H3UUyEXNXc3sBexQ4j2LYo9z6CfvmY8mjPFC9VNNpgGzB22yOIHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Career Counselling Form - Career Counselling Analyzer</title>
    
<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color:antiquewhite;

  }

  .navbar {
    /* background: linear-gradient(to bottom right, #5f9ea0, #49767b); */
    background: linear-gradient(to bottom right, #5f9ea0,#30757a,#5f9ea0);

  }

   #nav{
    margin-left: 20px;
    background-color: #ccc;
    color:black;
    font-family: cursive;
    font-weight: bold;
    text-decoration: none;   
}

  .navbar .icon {
    float: right;
    font-size: 20px;
    margin-right: 15px;
  }

  .user-icon {
    border-radius: 50%;
    background-color: #ccc;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    font-size: 20px;
    color: #333;
    float: right;
    margin-right: 10px;
  }
</style>
</head>
<body>
      


    <div class="navbar">
        <button type="button" name="nav" id="nav" onclick="logout()" class="btn btn-secondary">Log Out</button>
        <div class="user-icon">
    <i class="fas fa-user">
    <?php 
include('connection.php'); 

// Sanitize session data to prevent SQL injection
$student_id = mysqli_real_escape_string($conn, $_SESSION["account"]);

// Prepare SQL statement to fetch full name based on student ID
$sql = "SELECT full_name FROM student WHERE student_id = '$student_id'";

$result = mysqli_query($conn, $sql);

if ($result->num_rows == 1) {
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Get the full name from the row
    $full_name = $row["full_name"];
    
    // Get the first letter of the full name
    $first_letter = strtoupper(substr($full_name, 0, 1)); // Convert to uppercase
   
    // Output the first letter
    echo $first_letter;
}
?>

    </i>
  </div>

</div>

<script>
    function logout() {
  // Redirect to logout.php
  window.location.href = "logout.php";
}
    
    </script>

<form action="#" method="POST">
<div class="container" >
        <div class="col-md-12">
            <div class="card mt-4">
           
            <div class="card-header" style="color:white; background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b); display: flex; justify-content: space-between; align-items: center;">
            <h4 class="text-center" style="margin: 0; flex-grow: 1;">Update Personal Information</h4>
    </div>


            <div class="card-body">
                <div class="main-form mt-3">
                    <div class="row">
                        
                        <div class="col-md-4 ">
                            <div class="form-group mb-2">
                                <label for="" style="font-weight: bold;">Full Name:</label>
                                <input type="text" class="form-control" name="fullname" value="<?php echo $result2['fullname'];?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">Personal Email ID:</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $result2['email'];?>" required>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">Contact Number:</label>
                                <input type="tel" name="contactnumber" value="<?php echo $result2['contactnumber'];?>" class="form-control"  >
                            </div>
                        </div>
                        
                    </div> 
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">HSC Result(%):</label>
                                <input type="number" name="result_hsc" class="form-control" value="<?php echo $result2['result_hsc'];?>" required step="any">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">Merit Rank:</label>
                                <input type="number" name="meritrank" class="form-control" value="<?php echo $result2['meritrank'];?>" required>
                            </div>
                        </div>
                        
                    </div>  
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for=""  style="font-weight: bold;">Medium:</label>
                                
                                <select class="form-select" aria-label="Default select example" name="medium"  required>
                                    
                                        <option value="" disabled selected>Select</option>     
                                        <option value="Gujarati"
                                        <?php 
                                        if($result2['medium']=='Gujarati')
                                        { 
                                            echo "selected";
                                        }    
                                       ?>
                                        >Gujarati</option>
                                        <option value="English" 
                                       <?php
                                        if($result2['medium']=='Engulish')
                                        { 
                                            echo "selected";
                                        }?>
                                        >English</option>
                                    </select>                                   
                                
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for=""  style="font-weight: bold;">Admission Type</label>
                        <select class="form-select" aria-label="Default select example" name="admissiontype" required>
                            <option value="" disabled selected>Select</option>
                            <option value="management-quota" <?php if ($result2['admissiontype'] == 'management-quota') echo 'selected'; ?>>MQ</option>
                            <option value="acpc" <?php if ($result2['admissiontype'] == 'acpc') echo 'selected'; ?>>ACPC</option>
                            <option value="nri" <?php if ($result2['admissiontype'] == 'nri') echo 'selected'; ?>>NRI</option>
                        </select>
                                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
    <div class="col-md-4">
        <div class="form-group mb-2">
        <label for=""  style="font-weight: bold;">Counsellor</label>
                        <select class="form-select" aria-label="Default select example" name="counsellor" required>
                            <option value="" disabled selected>Select</option>
                            
                            <option value="Avani Khokhariya" 
                            <?php if ($result2['counsellor'] == 'Avani Khokhariya') echo 'selected'; ?>
                            >Avani Khokhariya</option>
                            
                            <option value="Abhishek Patel" 
                            <?php if ($result2['counsellor'] == 'Abhishek Patel') echo 'selected'; ?>
                            >Abhishek Patel</option>
                            
                            <option value="Bela Shah"
                             <?php if ($result2['counsellor'] == 'Bela Shah') echo 'selected'; ?>
                            >Bela Shah</option>
                            
                            <option value="Brinda Patel" 
                            <?php if ($result2['counsellor'] == 'Brinda Patel') echo 'selected'; ?>
                            >Brinda Patel</option>
                            
                            <option value="Dharmedrasinh Rathod" 
                            <?php if ($result2['counsellor'] == 'Dharmedrasinh Rathod') echo 'selected'; ?>
                            >Dharmedrasinh Rathod</option>
                            
                            <option value="Harshul Yagnik"
                             <?php if ($result2['counsellor'] == 'Harshul Yagnik') echo 'selected'; ?>
                             >Harshul Yagnik</option>

                            <option value="Hemang Thakkar" 
                            <?php if ($result2['counsellor'] == 'Hemang Thakkar') echo 'selected'; ?>
                            >Hemang Thakkar</option>

                            <option value="Srushti Gajjar"
                             <?php if ($result2['counsellor'] == 'Srushti Gajjar') echo 'selected'; ?>
                             >Srushti Gajjar</option>
                            
                             <option value="Vidhisha Pradhan" 
                            <?php if ($result2['counsellor'] == 'Vidhisha Pradhan') echo 'selected'; ?>
                            >Vidhisha Pradhan</option>
                            
                            <option value="Vaibhahvi Patel" 
                            <?php if ($result2['counsellor'] == 'Vaibhahvi Patel') echo 'selected'; ?>
                            >Vaibhahvi Patel</option>

                            <option value="Pinal Hansora"
                             <?php if ($result2['counsellor'] == 'Pinal Hansora') echo 'selected'; ?>
                             >Pinal Hansora</option>

                        </select>
        </div>
    </div>

                            
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for=""  style="font-weight: bold;">Current Semester:</label>
                                    <input type="number" name="currentsemester" class="form-control" value="<?php echo $result2['currentsemester'];?>" required>
                                </div>
                            </div>                                
                        </div>

                        
                        <center>
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <div class="form-group mb-2">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                            <center>
                                
                                </div>
                                </div>
                    </div>
                                  
                  </div>
           </div>
    

<?php
include('connection.php');
if(isset($_POST['update']))
{
  $full_name     =$_POST['fullname'];
  $contact       =$_POST['contactnumber'];
  $email         =$_POST['email'];
  $hsc           =$_POST['result_hsc'];
  $medium        =$_POST['medium'];
  $meritrank     =$_POST['meritrank'];
  $admission     =$_POST['admissiontype'];
  $currentsem    =$_POST['currentsemester'];
  $counsellor     =$_POST['counsellor'];

  echo "counsellor is ".$counsellor;
//   $query1 = "UPDATE personalinformation SET fullname='$full_name',contactnumber='$contact',email='$email',result_hsc='$hsc',medium='$medium',meritrank='$meritrank',admissiontype='$admission',currentsemester='$currentsem',counsellor=$counsellor";
  $query1 = "UPDATE personalinformation SET fullname='$full_name', contactnumber='$contact', email='$email', result_hsc='$hsc', medium='$medium', meritrank='$meritrank', admissiontype='$admission', currentsemester='$currentsem', counsellor='$counsellor' WHERE student_id='$student_id'";

  $data=mysqli_query($conn,$query1);

  if($data)
  {
    echo "<script>alert('Recored is Updated'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";
  }
  else
  {
    echo "<script>alter('Record is not Updated');</script>";
  }
}else
{
    echo "<script>alter('logical error');</script>";

}
?>
