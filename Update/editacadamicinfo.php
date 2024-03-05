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
        <div class="col-md-12 ">
            <div class="card mt-4">
                <div class="card-header" style="color:white; background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);" >
                    <h4 class="text-center"4>Update Academic Information</h4>
                </div>
                <div class="card-body">
                      
                      <div class="main-form mt-2">
                        <div class="row">
                          
                        <div class="col-md-4 ">
                              <div class="form-group mb-2">
                                  <h5 style="font-weight: bold;">Semester wise SGPA</h5>
                              </div>
                          </div>
                        </div> 

                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 1:</label>
                                  <input type="number" name="sem1" value="<?php echo $result2['sem1'];?>" class="form-control" step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 2:</label>
                                  <input type="number" name="sem2" class="form-control" value="<?php echo $result2['sem2'];?>"step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 3:</label>
                                  <input type="number" name="sem3" class="form-control" value="<?php echo $result2['sem3'];?>"step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 4:</label>
                                  <input type="number" name="sem4" class="form-control" value="<?php echo $result2['sem4'];?>"step="any">
                              </div>
                          </div>
                        
                        </div>
                        <div class="row">  
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 5:</label>
                                  <input type="number" name="sem5" class="form-control" value="<?php echo $result2['sem5'];?>"step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 6:</label>
                                  <input type="number" name="sem6" class="form-control" value="<?php echo $result2['sem6'];?>"step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 7:</label>
                                  <input type="number" name="sem7" class="form-control" value="<?php echo $result2['sem7'];?>"step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Sem 8:</label>
                                  <input type="number" name="sem8" class="form-control" value="<?php echo $result2['sem8'];?>"step="any">
                              </div>
                          </div>
                       
                        </div>
                       
                        <div class="row">
                        <div class="col-md-3 mt-2">
                              <div class="form-group mb-2">
                              <h5 style="font-weight: bold;">Year wise CGPA</h5>
                              </div>
                          </div>

                        </div>  
                        
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Year 1:</label>
                                  <input type="number" name="year1" class="form-control" value="<?php echo $result2['year1'];?>"step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Year 2:</label>
                                  <input type="number" name="year2" class="form-control" value="<?php echo $result2['year2'];?>"step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                              <div class="form-group mb-2">
                                  <label for=""  style="font-weight: bold;">Year 3:</label>
                                  <input type="number" name="year3" class="form-control" value="<?php echo $result2['year3'];?>"step="any">
                              </div>
                          </div>
                        
                          <div class="col-md-3">
                            <div class="form-group mb-2">
                              <label for=""  style="font-weight: bold;">Year 4:</label>
                              <input type="number" name="year4" class="form-control" value="<?php echo $result2['year4'];?>"step="any">
                            </div>
                          </div>
                          
                        </div>
                      </div>
                  </div>
</div>
</div>
</div>


<div class="container mb-4" >
      <div class="col-md-12 ">
            <div class="card mt-4">
                <div class="card-header" style="color:white; background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);" >
                    <h4 class="text-center">Career option</h4>
                </div>
       
                <div class="card-body">
                      
                         <div class="main-form mt-2">
                           <div class="row">
                            <div class="col-md-4">
                              <div class="form-group mb-2">
                                  <label for="" style="font-weight: bold;">Choose Your Interest:</label>
                                  <select class="form-select" aria-label="Default select example" name="interest" value="<?php echo $result2['interest'];?>" required>
                                      <option value="" disabled selected>Select</option>
                                      
                                      <option value="Wants to job (Placement)"
                                        <?php 
                                        if($result2['interest']=='Wants to job (Placement)')
                                        { 
                                            echo "selected";
                                        }    
                                       ?>
                                        >Wants to job (Placement)</option>
                                        
                                        <option value="Further Study" 
                                       <?php
                                        if($result2['interest']=='Further Study')
                                        { 
                                            echo "selected";
                                        }?>
                                        >Further Study</option>
                                
                                        <option value="Entrepreneurship" 
                                       <?php
                                        if($result2['interest']=='Entrepreneurship')
                                        { 
                                            echo "selected";
                                        }?>
                                        >Entrepreneurship</option>
                                   
                                       <option value="Not Decided" 
                                       <?php
                                        if($result2['interest']=='Not Decided')
                                        { 
                                            echo "selected";
                                        }?>
                                        >Not Decided</option>
                                  </select>
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
</form>
</body>
</html>



<?php
include('connection.php');
if(isset($_POST['update']))
{
   $sem1          =$_POST['sem1'];
  $sem2          =$_POST['sem2'];
  $sem3          =$_POST['sem3'];
  $sem4          =$_POST['sem4'];
  $sem5          =$_POST['sem5'];
  $sem6          =$_POST['sem6'];
  $sem7          =$_POST['sem7'];
  $sem8          =$_POST['sem8'];
  $year1          =$_POST['year1'];
  $year2          =$_POST['year2'];
  $year3          =$_POST['year3'];
  $year4          =$_POST['year4'];
  $interest        =$_POST['interest'];


//   $query1 = "UPDATE personalinformation SET fullname='$full_name',contactnumber='$contact',email='$email',result_hsc='$hsc',medium='$medium',meritrank='$meritrank',admissiontype='$admission',currentsemester='$currentsem',counsellor=$counsellor";
//   $query1 = "UPDATE personalinformation SET sem1='$sem1',  sem2='$sem2', sem3='$sem3', sem4='$sem4', year1='$year1', year2='$year2', year3='$year3', year4='$year4', WHERE student_id='$student_id'";
$query1 = "UPDATE personalinformation SET sem1='$sem1',  sem2='$sem2', sem3='$sem3', sem4='$sem4', year1='$year1', year2='$year2', year3='$year3', year4='$year4', interest = '$interest' WHERE student_id='$student_id'";

  $data=mysqli_query($conn,$query1);

  if($data)
  {
    echo "<script>alert('Recored is Updated'); setTimeout(function(){ window.location.href = 'fdisplay.php'; }, 0);</script>";
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


















