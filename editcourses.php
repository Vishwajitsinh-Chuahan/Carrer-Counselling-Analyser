<?php
session_start();
if(!(isset($_SESSION['logedin']))|| $_SESSION['logedin']!=true)
{
    header('Location:login.php');
    
}else{
    include('connection.php');
   $id=$_GET['id'];
//    echo "id is".$id;
   $query= "SELECT * FROM nptel WHERE student_id='$id'";
   $nptel = mysqli_query($conn,$query);

   $result1=mysqli_fetch_assoc($nptel);


//    echo "id is".$id;
   $query= "SELECT * FROM professionalcourses WHERE student_id='$id'";
   $data3 = mysqli_query($conn,$query);

   $result3=mysqli_fetch_assoc($data3);
//    echo "id is".$id;
   $query= "SELECT * FROM research WHERE student_id='$id'";
   $data2 = mysqli_query($conn,$query);

   $result2=mysqli_fetch_assoc($data2);
//    echo "id is".$id;
   $query= "SELECT * FROM github WHERE student_id='$id'";
   $data4 = mysqli_query($conn,$query);

   $result4=mysqli_fetch_assoc($data4);
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
     /* Position the navbar at the top of the page */
     

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
  .row .form-group {
        margin-bottom: 0;
    }

    .add-nptel-form,.add-prof-form,.add-git-form
     {
        position: absolute;
        right: 100px;
    }
    .table th:nth-child(2),
    .table td:nth-child(2) {
        width: 500px; 
    }
    
    .table th:nth-child(1),
    .table td:nth-child(1) {
        width: 1000px; 
    }
    #nptel-table,#prof-table,#git-table {
        border-collapse: collapse;
         /* Decrease table width */
    }
    .github-table th:nth-child(3),
.github-table td:nth-child(3) {
    width: 1000px; 
}


    #nptel-table th,
    #nptel-table td ,#prof-table th,#prof-table td,#git-table th,#git-table td{
        border: 1px solid #ddd; /* Set border color and style */
        padding: 5px; /* Decrease padding for better spacing */
         
        /* Center align content  */
    }

    #nptel-table th,#prof-table th,#git-table th {
        background-color: #f2f2f2; /* Add background color to table headers */
        text-align: center;
    }

    .btn {
        padding: 6px 12px; /* Adjust button padding */
        margin: 0; /* Remove button margin */
    }

    /* Center align buttons */
    .form-group.mb-0 {
        display: flex;
        justify-content: center;
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

                <div class="card-header" style="background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b); color:white;" >
                <h4 class="text-center">Technical Profile</h4>
                </div>
                
            <div class="card-body">

                <div class="main-form mt-2">
               
                <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group mb-2">
                    <label for="" style="font-weight: bold;">Linkedin Profile Link:</label>
                        <input type="url" name="link" class="form-control" value="<?php echo $result4['link'] ;?>"
                            placeholder="https://www.linkedin.com/in/your-profile" required>
                        </div>
                </div>
             </div> 
                                

             <div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="" style="font-weight: bold;">Nptel Courses:</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table" id="nptel-table">
                <thead>
                    <tr>
                        <th>Nptel Course</th>
                        <th>Score</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connection.php');
                    $query = "SELECT * FROM nptel WHERE student_id='$id'";
                    $nptel = mysqli_query($conn, $query);
                    while ($row1 = $nptel->fetch_assoc()) {
                        ?>

                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="hidden" name="sr_no[]" value="<?php echo $row1['sr_no']; ?>">
                                    <input type="text" name="nptelcourses[]" class="form-control text-center" required placeholder="Enter course" value="<?php echo $row1['nptelcourses']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="nscore[]" class="form-control text-center" placeholder="Enter score" value="<?php echo $row1['nscore']; ?>">
                                </div>
                            </td>
                           
                            <td>
                                <div class="form-group mb-0 mt-2">
                                    <button type="button" class="remove-btn btn btn-danger">Remove</button>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-0 mt-2">
                                    <button type="submit" name="update" class="update-btn btn btn-success">Update</button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="paste-new-forms-nptel"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="" style="font-weight: bold;">Professional Courses:</label>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table" id="prof-table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Result</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connection.php');
                    $query = "SELECT * FROM professionalcourses WHERE student_id='$id'";
                    $profcourse = mysqli_query($conn, $query);
                    while ($row2 = $profcourse->fetch_assoc()) {
                        ?>

                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="hidden" name="sr_no[]" value="<?php echo $row2['sr_no']; ?>">
                                    <input type="text" name="course[]" class="form-control text-center" required placeholder="Enter course" value="<?php echo $row2['course']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="result[]" class="form-control text-center" placeholder="Enter result" value="<?php echo $row2['result']; ?>">
                                </div>
                            </td>
                           
                            <td>
                                <div class="form-group mb-0 mt-2">
                                    <button type="button" class="remove-btn btn btn-danger">Remove</button>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-0 mt-2">
                                    <button type="submit" name="update1" class="update-btn btn btn-success">Update</button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
<div class="paste-new-forms-prof"></div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="" style="font-weight: bold;">Project / Research paper:</label>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table" id="prof-table">
                <thead>
                    <tr>
                        <th>Project / Research paper</th>
                        <th>Used Technology</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connection.php');
                    $query = "SELECT * FROM research WHERE student_id='$id'";
                    $research = mysqli_query($conn, $query);
                    while ($row2 = $research->fetch_assoc()) {
                        ?>

                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="hidden" name="sr_no[]" value="<?php echo $row2['sr_no']; ?>">
                                    <input type="text" name="project[]" class="form-control text-center" required placeholder="Enter project/research paper name" value="<?php echo $row2['project']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="text" name="tech[]" class="form-control text-center" placeholder="Enter technology" value="<?php echo $row2['tech']; ?>">
                                </div>
                            </td>
                           
                            <td>
                                <div class="form-group mb-0 mt-2">
                                    <button type="button" class="remove-btn btn btn-danger">Remove</button>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-0 mt-2">
                                    <button type="submit" name="update2" class="update-btn btn btn-success">Update</button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
<div class="paste-new-forms-prof"></div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="" style="font-weight: bold;">Github Details :</label>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="table-responsive">
        <table class="table github-table" id="git-table">
                <thead>
                    <tr>
                        <th>Number of Projects</th>
                        <th>Total Contributions</th>
                        <th>Total stars earned</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connection.php');
                    $query = "SELECT * FROM github WHERE student_id='$id'";
                    $research = mysqli_query($conn, $query);
                    while ($row2 = $research->fetch_assoc()) {
                        ?>

                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="hidden" name="sr_no[]" value="<?php echo $row2['sr_no']; ?>">
                                    <input type="number" name="githubprojectrepo[]" class="form-control text-center" required placeholder="Enter project/research paper name" value="<?php echo $row2['githubprojectrepo']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="contributions[]" class="form-control text-center" placeholder="Enter technology" value="<?php echo $row2['contributions']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="githubstars[]" class="form-control text-center" placeholder="Enter technology" value="<?php echo $row2['githubstars']; ?>">
                                </div>
                            </td>
                           
                            <td>
                                <div class="form-group mb-0 mt-2">
                                    <button type="submit" name="update3" class="update-btn btn btn-success">Update</button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
<div class="paste-new-forms-prof"></div>

<script>
    $(document).ready(function () {
        // Add Nptel Form
        $(document).on('click', '.add-nptel-form', function () {
            addNptelForm();
        });

        // Add Professional Form
        $(document).on('click', '.add-prof-form', function () {
            addProfForm();
        });

        // Remove Row
        $(document).on('click', '.remove-btn', function () {
            $(this).closest('tr').remove();
        });

        // Update Button
        $(document).on('click', '.update-btn', function () {
            // $(this).closest('form').submit();
        });

        // function addNptelForm() {
        //     var newRow = $('<tr></tr>');
        //     newRow.append('<td><div class="form-group mb-2 mt-2"><input type="text" name="nptelcourses[]" class="form-control text-center" required placeholder="Enter course"></div></td>');
        //     newRow.append('<td><div class="form-group mb-2 mt-2"><input type="number" name="nscore[]" class="form-control text-center" placeholder="Enter score"></div></td>');
        //     newRow.append('<td><div class="form-group mb-0 mt-2"><button type="button" class="remove-btn btn btn-danger">Remove</button></div></td>');
        //     newRow.append('<td><div class="form-group mb-0 mt-2"><button type="button" class="update-btn btn btn-success">Update</button></div></td>');
        //     $('#nptel-table tbody').append(newRow);
        // }

        // function addProfForm() {
        //     var newRow = $('<tr></tr>');
        //     newRow.append('<td><div class="form-group mb-2 mt-2"><input type="text" name="course[]" class="form-control text-center" required placeholder="Enter course"></div></td>');
        //     newRow.append('<td><div class="form-group mb-2 mt-2"><input type="number" name="result[]" class="form-control text-center" placeholder="Enter result"></div></td>');
        //     newRow.append('<td><div class="form-group mb-0 mt-2"><button type="button" class="remove-btn btn btn-danger">Remove</button></div></td>');
        //     newRow.append('<td><div class="form-group mb-0 mt-2"><button type="button" class="update-btn btn btn-success">Update</button></div></td>');
        //     $('#prof-table tbody').append(newRow);
        // }
    });
</script>

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
if(isset($_POST['update'])) {
    // Loop through the submitted data to update each row
    for ($i = 0; $i < count($_POST['sr_no']); $i++) {
        // Check if the array keys exist before accessing them
        if(isset($_POST['sr_no'][$i]) && isset($_POST['nptelcourses'][$i])) {
            $sr_no = $_POST['sr_no'][$i]; // Fetch sr_no from the form
            $nptelcourses = $_POST['nptelcourses'][$i];
            $nscore = $_POST['nscore'][$i];
            
            // Update query for each row
            $nptelquery = "UPDATE nptel SET nptelcourses='$nptelcourses', nscore='$nscore' WHERE sr_no = '$sr_no'";
            $query_run = mysqli_query($conn, $nptelquery);

            if($query_run) {
                echo "<script>alert('Update Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";

            } else {
                echo "<script>alert('Error updating records.');</script>";
            }
        } else {
            echo "Undefined array key at index $i";
        }
    }
}else if(isset($_POST['update1'])) {
    // Loop through the submitted data to update each row
    for ($i = 0; $i < count($_POST['sr_no']); $i++) {
        // Check if the array keys exist before accessing them
        if(isset($_POST['sr_no'][$i]) && isset($_POST['course'][$i])) {
            $sr_no = $_POST['sr_no'][$i]; // Fetch sr_no from the form
            $course = $_POST['course'][$i];
            $result = $_POST['result'][$i];
            
            // Update query for each row
            $Profquery = "UPDATE professionalcourses SET course='$course', result='$result' WHERE sr_no = '$sr_no'";
            $query_run = mysqli_query($conn, $Profquery);

            if($query_run) {
                echo "<script>alert('Update Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";

            } else {
                echo "<script>alert('Error updating records.');</script>";
            }
        } else {
            echo "Undefined array key at index $i";
        }
    }

}
else if(isset($_POST['update2'])) {
    // Loop through the submitted data to update each row
    for ($i = 0; $i < count($_POST['sr_no']); $i++) {
        // Check if the array keys exist before accessing them
        if(isset($_POST['sr_no'][$i]) && isset($_POST['project'][$i])) {
            $sr_no = $_POST['sr_no'][$i]; // Fetch sr_no from the form
            $project = $_POST['project'][$i];
            $tech = $_POST['tech'][$i];
            
            // Update query for each row
            $Profquery = "UPDATE research SET project='$project', tech='$tech' WHERE sr_no = '$sr_no'";
            $query_run = mysqli_query($conn, $Profquery);

            if($query_run) {
                echo "<script>alert('Update Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";

            } else {
                echo "<script>alert('Error updating records.');</script>";
            }
        } else {
            echo "Undefined array key at index $i";
        }
    }

}
else if(isset($_POST['update3'])) {
    // Loop through the submitted data to update each row
    for ($i = 0; $i < count($_POST['sr_no']); $i++) {
        // Check if the array keys exist before accessing them
        if(isset($_POST['sr_no'][$i]) && isset($_POST['githubprojectrepo'][$i])) {
            $sr_no = $_POST['sr_no'][$i]; // Fetch sr_no from the form
            $githubprojectrepo = $_POST['githubprojectrepo'][$i];
            $contributions = $_POST['contributions'][$i];
            $githubstars	 = $_POST['githubstars'][$i];
            
            // Update query for each row
            $Gitquery = "UPDATE github SET githubprojectrepo='$githubprojectrepo', contributions='$contributions' , githubstars='$githubstars' WHERE sr_no = '$sr_no'";
            $query_run = mysqli_query($conn, $Gitquery);

            if($query_run) {
                echo "<script>alert('Update Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";

            } else {
                echo "<script>alert('Error updating records.');</script>";
            }
        } else {
            echo "Undefined array key at index $i";
        }
    }

}
?>
