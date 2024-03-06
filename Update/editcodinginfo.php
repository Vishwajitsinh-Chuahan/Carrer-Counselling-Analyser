<?php
session_start();
if(!(isset($_SESSION['logedin']))|| $_SESSION['logedin']!=true)
{
    header('Location:login.php');
    
}else{
    include('connection.php');
   $id=$_GET['id'];
//    echo "id is".$id;
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
    
  .table {
        width: 100%; /* Adjust the width as needed */
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
     
    .table {
        width: 100%; /* Adjust the width as needed */
    }

    .table th:nth-child(2),
    .table td:nth-child(2) {
        width: 700px; 
    }
    
    .table th:nth-child(1),
    .table td:nth-child(1) {
        width: 700px; 
    }
    
    .table th:nth-child(3),
    .table td:nth-child(3) {
        width: 500px; 
    }
    
    
    .table th:nth-child(4),
    .table td:nth-child(4) {
        width: 1000px; 
    }
    #copdechef-table,#hackerrank-table,#leetcode-table {
        border-collapse: collapse;
    }

    #copdechef-table th,#hackerrank-table th,#leetcode-table th,#leetcode-table td,
    #copdechef-table td,#hackerrank-table td{
        border: 2px solid #ddd; /* Set border color and style */
        padding: 5px; /* Decrease padding for better spacing */
        
        /* Center align content  */
    }
    
    #copdechef-table th,#hackerrank-table th,#leetcode-table th {
        text-align: center;
        background-color: #f2f2f2; /* Add background color to table headers */
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
    <div class="col-md-12">
        <div class="form-group">
            <label for="" style="font-weight: bold;">Codechef Details:</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table" id="copdechef-table">
                <thead>
                    <tr>
                        <th>Language</th>
                        <th>Rank</th>
                        <th>Points</th>
                        <th>Number of Problem Solved</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connection.php');
                    $query = "SELECT * FROM codechef WHERE student_id='$id'";
                    $codechef = mysqli_query($conn, $query);
                    while ($row1 = $codechef->fetch_assoc()) {
                        ?>

                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="hidden" name="sr_no[]" value="<?php echo $row1['sr_no']; ?>">
                                    <!-- <input type="text" name="clanguages[]" class="form-control text-center" required placeholder="Enter Language" value="<?php echo $row1['clanguages']; ?>"> -->
                        <select class="form-select" aria-label="Default select example" name="clanguages[]" required>
                            <option value="" disabled selected>Select</option>
                            <option value="C"<?php if ($row1['clanguages'] == 'C') echo 'selected'; ?>>C</option>
                            <option value="C++"<?php if ($row1['clanguages'] == 'C++') echo 'selected'; ?>>C++</option>
                            <option value="Java"<?php if ($row1['clanguages'] == 'Java') echo 'selected'; ?>>Java</option>
                            <option value="Python"<?php if ($row1['clanguages'] == 'Python') echo 'selected'; ?>>Python</option>
                            
                        </select>
       
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="crank[]" class="form-control text-center" placeholder="Enter Rank" value="<?php echo $row1['crank']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="cpoint[]" class="form-control text-center" placeholder="Enter Points" value="<?php echo $row1['cpoint']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="cnumber[]" class="form-control text-center" placeholder="Enter solved problem" value="<?php echo $row1['cnumber']; ?>">
                                </div>
                            </td>
                           
                            <td>
                                <div class="form-group mb-0 mt-2">
                                    <button type="submit" name="remove" value="<?php echo $row1['sr_no']; ?>" class="remove-btn btn btn-danger">Remove</button>
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
            <label for="" style="font-weight: bold;">HackerRank Details:</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table" id="hackerrank-table">
                <thead>
                    <tr>
                        <th>Language</th>
                        <th>Rank</th>
                        <th>Points</th>
                        <th>Number of Problem Solved</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connection.php');
                    $query = "SELECT * FROM hackerrank WHERE student_id='$id'";
                    $hackerrank = mysqli_query($conn, $query);
                    while ($row1 = $hackerrank->fetch_assoc()) {
                        ?>

                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="hidden" name="sr_no[]" value="<?php echo $row1['sr_no']; ?>">
                                    <!-- <input type="text" name="hlanguages[]" class="form-control text-center" required placeholder="Enter Language" value="<?php echo $row1['hlanguages']; ?>"> -->
                                    <select class="form-select" aria-label="Default select example" name="clanguages[]" required>
                            <option value="" disabled selected>Select</option>
                            <option value="C"<?php if ($row1['hlanguages'] == 'C') echo 'selected'; ?>>C</option>
                            <option value="C++"<?php if ($row1['hlanguages'] == 'C++') echo 'selected'; ?>>C++</option>
                            <option value="Java"<?php if ($row1['hlanguages'] == 'Java') echo 'selected'; ?>>Java</option>
                            <option value="Python"<?php if ($row1['hlanguages'] == 'Python') echo 'selected'; ?>>Python</option>
                            
                        </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="hrank[]" class="form-control text-center" placeholder="Enter Rank" value="<?php echo $row1['hrank']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="hpoint[]" class="form-control text-center" placeholder="Enter Points" value="<?php echo $row1['hpoint']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="hnumber[]" class="form-control text-center" placeholder="Enter solved problem" value="<?php echo $row1['hnumber']; ?>">
                                </div>
                            </td>
                           
                            <td>
                                <div class="form-group mb-0 mt-2">
                                   <button type="submit" name="remove1" value="<?php echo $row1['sr_no']; ?>" class="remove-btn btn btn-danger">Remove</button>             
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
<div class="paste-new-forms-hackerrank"></div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="" style="font-weight: bold;">LeetCode Details:</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table" id="leetcode-table">
                <thead>
                    <tr>
                        <th>Language</th>
                        <th>Rank</th>
                        <th>Points</th>
                        <th>Number of Problem Solved</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connection.php');
                    $query = "SELECT * FROM leetcode WHERE student_id='$id'";
                    $leetcode = mysqli_query($conn, $query);
                    while ($row1 = $leetcode->fetch_assoc()) {
                        ?>

                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="hidden" name="sr_no[]" value="<?php echo $row1['sr_no']; ?>">
                                    <!-- <input type="text" name="languages[]" class="form-control text-center" required placeholder="Enter Language" value="<?php echo $row1['languages']; ?>"> -->
                                    <select class="form-select" aria-label="Default select example" name="languages[]" required>
                            <option value="" disabled selected>Select</option>
                            <option value="C"<?php if ($row1['languages'] == 'C') echo 'selected'; ?>>C</option>
                            <option value="C++"<?php if ($row1['languages'] == 'C++') echo 'selected'; ?>>C++</option>
                            <option value="Java"<?php if ($row1['languages'] == 'Java') echo 'selected'; ?>>Java</option>
                            <option value="Python"<?php if ($row1['languages'] == 'Python') echo 'selected'; ?>>Python</option>
                            
                        </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="lrank[]" class="form-control text-center" placeholder="Enter Rank" value="<?php echo $row1['lrank']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="lpoint[]" class="form-control text-center" placeholder="Enter Points" value="<?php echo $row1['lpoint']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-2 mt-2">
                                    <input type="number" name="lnumber[]" class="form-control text-center" placeholder="Enter solved problem" value="<?php echo $row1['lnumber']; ?>">
                                </div>
                            </td>
                           
                            <td>
                                <div class="form-group mb-0 mt-2">
                                   <button type="submit" name="remove2" value="<?php echo $row1['sr_no']; ?>" class="remove-btn btn btn-danger">Remove</button>    
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
<div class="paste-new-forms-leetcode"></div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        if(isset($_POST['sr_no'][$i]) && isset($_POST['clanguages'][$i])) {
            $sr_no = $_POST['sr_no'][$i]; // Fetch sr_no from the form
            $languages = $_POST['clanguages'][$i];
            $rank = $_POST['crank'][$i];
            $point = $_POST['cpoint'][$i];
            $number = $_POST['cnumber'][$i];
            
            // Update query for each row
            $query = "UPDATE codechef SET clanguages='$languages', crank='$rank', cpoint='$point', cnumber='$number' WHERE sr_no = '$sr_no'";
            $query_run = mysqli_query($conn, $query);

            if($query_run) {
                echo "<script>alert('Update Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";

            } else {
                echo "<script>alert('Error updating records.');</script>";
            }
        } else {
            echo "Undefined array key at index $i";
        }
    }
} else if(isset($_POST['update1'])) {
    // Loop through the submitted data to update each row
    for ($i = 0; $i < count($_POST['sr_no']); $i++) {
        // Check if the array keys exist before accessing them
        if(isset($_POST['sr_no'][$i]) && isset($_POST['hlanguages'][$i])) {
            $sr_no = $_POST['sr_no'][$i]; // Fetch sr_no from the form
            $languages = $_POST['hlanguages'][$i];
            $rank = $_POST['hrank'][$i];
            $point = $_POST['hpoint'][$i];
            $number = $_POST['hnumber'][$i];
            
            // Update query for each row
            $query = "UPDATE hackerrank SET hlanguages='$languages', hrank='$rank', hpoint='$point', hnumber='$number' WHERE sr_no = '$sr_no'";
            $query_run = mysqli_query($conn, $query);

            if($query_run) {
                echo "<script>alert('Update Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";

            } else {
                echo "<script>alert('Error updating records.');</script>";
            }
        } else {
            echo "Undefined array key at index $i";
        }
    }
} else if(isset($_POST['update2'])) {
    // Loop through the submitted data to update each row
    for ($i = 0; $i < count($_POST['sr_no']); $i++) {
        // Check if the array keys exist before accessing them
        if(isset($_POST['sr_no'][$i]) && isset($_POST['languages'][$i])) {
            $sr_no = $_POST['sr_no'][$i]; // Fetch sr_no from the form
            $languages = $_POST['languages'][$i];
            $rank = $_POST['lrank'][$i];
            $point = $_POST['lpoint'][$i];
            $number = $_POST['lnumber'][$i];
            
            // Update query for each row
            $query = "UPDATE leetcode SET languages='$languages', lrank='$rank', lpoint='$point', lnumber='$number' WHERE sr_no = '$sr_no'";
            $query_run = mysqli_query($conn, $query);

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
    else if(isset($_POST['remove'])) {
    $sr_no = mysqli_real_escape_string($conn, $_POST['remove']);
    $query = "DELETE FROM codechef WHERE sr_no = '$sr_no'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo "<script>alert('Remove Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";
    } else {
        echo "<script>alert('Error in Removing records.');</script>";
    }
}

else if(isset($_POST['remove1'])) {
    $sr_no = mysqli_real_escape_string($conn, $_POST['remove1']);
    $query = "DELETE FROM hackerrank WHERE sr_no = '$sr_no'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo "<script>alert('Remove Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";
    } else {
        echo "<script>alert('Error in Removing records.');</script>";
    }
}

else if(isset($_POST['remove2'])) {
    $sr_no = mysqli_real_escape_string($conn, $_POST['remove2']);
    $query = "DELETE FROM leetcode WHERE sr_no = '$sr_no'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo "<script>alert('Remove Successfully.'); setTimeout(function(){ window.location.href = 'fdisplay.php'; },0);</script>";
    } else {
        echo "<script>alert('Error in Removing records.');</script>";
    }
}
?>
