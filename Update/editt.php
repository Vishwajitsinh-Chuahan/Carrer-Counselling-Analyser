<?php
session_start();
if(!(isset($_SESSION['logedin']))|| $_SESSION['logedin']!=true)
{
    header('Location:login.php');
    
}else{
    include('connection.php');
   $id=$_GET['id'];
//    echo "id is".$id;
   $query= "SELECT * FROM technologystand WHERE student_id='$id'";
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
<div class="container">
  <div class="col-md-12">
    <div class="card mt-4">
      <div class="card-header" style="color:white; background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);">
                            
      <h4 class="text-center">Technology Stand</h4>
                            
                          </div>
                          <div class="card-body">
                              
                              <div class="main-form mt-2">
                                <div class="row">
                                  
                                  <div class="col-md-3 ">
                                            <div class="form-group mb-2">
                                                <label for="" style="font-weight: bold;">Competavtive
                                                  Programming:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                name="cp" required>
                                                    <option value="" disabled selected>Select your score out of 5
                                                      </option>
                                                      <option value="1" <?php if ($result2['cp'] == '1') echo 'selected'; ?>>1</option>
                                                    <option value="2" <?php if($result2['cp']=='2')echo "selected";?>>2</option>
                                                    <option value="3" <?php if($result2['cp']=='3')echo "selected";?>>3</option>
                                                    <option value="4" <?php if($result2['cp']=='4')echo "selected";?>>4</option>
                                                    <option value="5" <?php if($result2['cp']=='5')echo "selected";?>>5</option>
                                                  </select>
                                            </div>
                                          </div>
                                          
                                          

                                          <div class="col-md-3">
                                            <div class="form-group mb-2">
                                              <label for="" style="font-weight: bold;">Web Development:</label>
                                              <select class="form-select" aria-label="Default select example"
                                              name="web" value="<?php echo $result2['web'];?>" required>
                                              <option value="" disabled selected>Select your score out of 5
                                                </option>
                                                <option value="1" <?php if($result2['web']=='1')echo "selected";?>>1</option>
                                                    <option value="2" <?php if($result2['web']=='2')echo "selected";?>>2</option>
                                                    <option value="3" <?php if($result2['web']=='3')echo "selected";?>>3</option>
                                                    <option value="4" <?php if($result2['web']=='4')echo "selected";?>>4</option>
                                                    <option value="5" <?php if($result2['web']=='5')echo "selected";?>>5</option>
                                                </select>
                                              </div>
                                        </div>


                                        <div class="col-md-3">
                                          <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;">AI & ML</label>
                                                <select class="form-select" aria-label="Default select example"
                                                name="ai" value="<?php echo $result2['ai'];?>" required>
                                                <option value="" disabled selected>Select your score out of 5
                                                  </option>
                                                  <option value="1" <?php if($result2['ai']=='1')echo "selected";?>>1</option>
                                                    <option value="2" <?php if($result2['ai']=='2')echo "selected";?>>2</option>
                                                    <option value="3" <?php if($result2['ai']=='3')echo "selected";?>>3</option>
                                                    <option value="4" <?php if($result2['ai']=='4')echo "selected";?>>4</option>
                                                    <option value="5" <?php if($result2['ai']=='5')echo "selected";?>>5</option>
                                                  </select>
                                                </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                              <label for="" style="font-weight: bold;">Android Development</label>
                                              <select class="form-select" aria-label="Default select example"
                                              name="android" value="<?php echo $result2['android'];?>" required>
                                              <option value="" disabled selected>Select your score out of 5
                                                </option>
                                                    <option value="1" <?php if($result2['android']=='1')echo "selected";?>>1</option>
                                                    <option value="2" <?php if($result2['android']=='2')echo "selected";?>>2</option>
                                                    <option value="3" <?php if($result2['android']=='3')echo "selected";?>>3</option>
                                                    <option value="4" <?php if($result2['android']=='4')echo "selected";?>>4</option>
                                                    <option value="5" <?php if($result2['android']=='5')echo "selected";?>>5</option>
                                                  </select>
                                                </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                      <div class="col-md-3">
                                            <div class="form-group mb-2">
                                              <label for="" style="font-weight: bold;">Any other:</label>
                                                <input type="text" name="otherfield"class="form-control" placeholder="Write any other fields" value="<?php echo $result2['otherfield'];?>"  required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;"></label>
                                            <select class="form-select" aria-label="Default select example"
                                                    name="any_score" value="<?php echo $result2['any_score'];?>"required>
                                                    <option value="" disabled selected>Select your score out of 5
                                                      </option>
                                                      <option value="1" <?php if($result2['any_score']=='1')echo "selected";?>>1</option>
                                                    <option value="2" <?php if($result2['any_score']=='2')echo "selected";?>>2</option>
                                                    <option value="3" <?php if($result2['any_score']=='3')echo "selected";?>>3</option>
                                                    <option value="4" <?php if($result2['any_score']=='4')echo "selected";?>>4</option>
                                                    <option value="5" <?php if($result2['any_score']=='5')echo "selected";?>>5</option>
                                                    </select>
                                            </div>
                                          </div>
                                    </div>

                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                              <label for="" style="font-weight: bold;">Prefered Technology:</label>
                                              <input type="text" name="prefer" class="form-control"
                                              placeholder="Write your prefered technology" value="<?php echo $result2['prefer'];?>" required>
                                              
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <center>
                                        <div class="row">
                                        <div class="col-md-4 mx-auto">
                                         <div class="form-group mb-2">
                                          <button type="submit" name="update" class="btn btn-primary">Edit</button>
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




<?php
include('connection.php');
if(isset($_POST['update']))
{
   $cp        =$_POST['cp'];
  $android          =$_POST['android'];
  $web          =$_POST['web'];
  $ai          =$_POST['ai'];
  $any_score          =$_POST['any_score'];
  $prefer          =$_POST['prefer'];
  $otherfield        =$_POST['otherfield'];



//   $query1 = "UPDATE personalinformation SET fullname='$full_name',contactnumber='$contact',email='$email',result_hsc='$hsc',medium='$medium',meritrank='$meritrank',admissiontype='$admission',currentsemester='$currentsem',counsellor=$counsellor";
//   $query1 = "UPDATE personalinformation SET sem1='$sem1',  sem2='$sem2', sem3='$sem3', sem4='$sem4', year1='$year1', year2='$year2', year3='$year3', year4='$year4', WHERE student_id='$student_id'";
$query1 = "UPDATE technologystand SET cp='$cp',web='$web',  ai='$ai', android='$android', otherfield='$otherfield', any_score='$any_score', prefer='$prefer' WHERE student_id='$student_id'";

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


















