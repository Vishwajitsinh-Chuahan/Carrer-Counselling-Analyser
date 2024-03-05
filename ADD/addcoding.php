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
                <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" style="font-weight: bold;">CodeChef Details</label>
                                    <label for="" style="font-weight: bold; color:red">Note: Select Language from C, C++, Java, Python</label>
                                </div>
                            </div>

                            <div class="main-form mt-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Languages:</label>
                                            <label for="" style="font-weight: bold;">Languages:</label>
                                            <select name="clanguages[]" class="form-select">
                                            <option value="" disabled selected>Select</option>   
                                            <option value="C">C</option>
                                            <option value="C++">C++</option>
                                            <option value="Java">Java</option>
                                            <option value="Python">Python</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Rank:</label>
                                            <input type="text" name="crank[]" class="form-control" placeholder="Enter Rank">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Points:</label>
                                            <input type="text" name="cpoint[]" class="form-control" placeholder="Enter Points">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Problem Solved:</label>
                                            <input type="text" name="cnumber[]" class="form-control" placeholder="Number of problems solved">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group mb-2">
                                            <br>
                                            <a href="javascript:void(0)" class="add-codechef-form float-end btn btn-primary">ADD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paste-new-forms-codechef"></div>

                        <br>
                                

                        <div class="col-md-4 ">
                            <div class="form-group mb-2">
                                <label for="" style="font-weight: bold;">HackerRank Details</label>
                                <label for="" style="font-weight: bold; color:red">Note: Select Language from C, C++, Java, Python</label>
                            </div>
                        </div>

                        <div class="main-form mt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;">Languages:</label>
                                            <select name="hlanguages[]" class="form-select">
                                            <option value="" disabled selected>Select</option>   
                                            <option value="C">C</option>
                                            <option value="C++">C++</option>
                                            <option value="Java">Java</option>
                                            <option value="Python">Python</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Rank:</label>
                                        <input type="text" name="hrank[]" class="form-control" placeholder="Enter Rank">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Points:</label>
                                        <input type="text" name="hpoint[]" class="form-control" placeholder="Enter Points">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Problem Solved:</label>
                                        <input type="text" name="hnumber[]" class="form-control" placeholder="Number of problems solved">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <br>
                                        <a href="javascript:void(0)" class="add-hackerrank-form float-end btn btn-primary">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paste-new-forms-hackerrank"></div>

                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" style="font-weight: bold;">Leetcode Details</label>
                                    <label for="" style="font-weight: bold; color:red">Note: Select Language from C, C++, Java, Python</label>
                                </div>
                            </div>

                            <div class="main-form mt-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                        <label for=""  style="font-weight: bold;">Languages:</label>
                                            <select name="languages[]" class="form-select">
                                            <option value="" disabled selected>Select</option>   
                                            <option value="C">C</option>
                                            <option value="C++">C++</option>
                                            <option value="Java">Java</option>
                                            <option value="Python">Python</option>
                                        </select>   
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Rank:</label>
                                            <input type="text" name="lrank[]" class="form-control" placeholder="Enter Rank">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="" style="font-weight: bold;">Points:</label>
                                            <input type="text" name="lpoint[]" class="form-control" placeholder="Enter Points">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <label for=""  style="font-weight: bold;">Problem Solved:</label>
                                            <input type="text" name="lnumber[]" class="form-control" placeholder="Number of problems solved">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group mb-2">
                                            <br>
                                            <a href="javascript:void(0)" class="add-leetcode-form float-end btn btn-primary">ADD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paste-new-forms-leetcode"></div>
                        
                        
                        <br>
                        
                        <div class="row text-center">
                        <div class="col-md-4 mx-auto">
                         <div class="form-group mb-2">
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                         </div>
                        </div>
                        </div>
                    </div>        
      </div>
    </div>
  </div>
  

        
        <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
$(document).ready(function () {
  
  $(document).on('click', '.add-codechef-form', function () {
    addCodeChefForm();
  });
  
  $(document).on('click', '.add-hackerrank-form', function () {
    addHackerRankForm();
  });
  
  $(document).on('click', '.add-leetcode-form', function () {
    addLeetCodeForm();
  });
  
  function addHackerRankForm() {
    $('.paste-new-forms-hackerrank').append('<div class="row">\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <select name="hlanguages[]" class="form-select"><option value="" disabled selected>Select</option><option value="C">C</option><option value="C++">C++</option><option value="Java">Java</option><option value="Python">Python</option></select>\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="hrank[]" class="form-control" placeholder="Enter Rank">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="hpoint[]" class="form-control" placeholder="Enter Points">\
            </div>\
        </div>\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <input type="text" name="hnumber[]" class="form-control" placeholder="Number of problems solved">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
            </div>\
        </div>\
    </div>');
  }
  
  function addCodeChefForm() {
    $('.paste-new-forms-codechef').append('<div class="row">\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <select name="clanguages[]" class="form-select" required>\
                    <option value="" disabled selected>Select Language</option>\
                    <option value="C">C</option>\
                    <option value="C++">C++</option>\
                    <option value="Java">Java</option>\
                    <option value="Python">Python</option>\
                </select>\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="crank[]" class="form-control" placeholder="Enter Rank">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="cpoint[]" class="form-control" placeholder="Enter Points">\
            </div>\
        </div>\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <input type="text" name="cnumber[]" class="form-control" placeholder="Number of problems solved">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
            </div>\
        </div>\
    </div>');
  }
  
  function addLeetCodeForm() {
    $('.paste-new-forms-leetcode').append('<div class="row">\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <select name="languages[]" class="form-select" required>\
                    <option value="" disabled selected>Select Language</option>\
                    <option value="C">C</option>\
                    <option value="C++">C++</option>\
                    <option value="Java">Java</option>\
                    <option value="Python">Python</option>\
                </select>\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="lrank[]" class="form-control" placeholder="Enter Rank">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <input type="text" name="lpoint[]" class="form-control" placeholder="Enter Points">\
            </div>\
        </div>\
        <div class="col-md-3">\
            <div class="form-group mb-2">\
                <input type="text" name="lnumber[]" class="form-control" placeholder="Number of problems solved">\
            </div>\
        </div>\
        <div class="col-md-2">\
            <div class="form-group mb-2">\
                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
            </div>\
        </div>\
    </div>');
  }
  
  $(document).on('click', '.remove-btn', function () {
    $(this).closest('.row').remove();
  });
});
</script>



      
</form>
</body>
</html>
<?php
include('connection.php');

if (isset($_POST['submit'])) {
    // Sanitize and validate inputs
    $student_id = isset($_SESSION["account"]) ? mysqli_real_escape_string($conn, $_SESSION["account"]) : '';
    $existingLanguages = array();

    $existingLanguagesQuery = "SELECT hlanguages FROM hackerrank WHERE student_id != '$student_id'";
    $result = mysqli_query($conn, $existingLanguagesQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        $existingLanguages[] = $row['hlanguages'];
    }
    
    $existingLanguagesQuery = "SELECT clanguages FROM codechef WHERE student_id != '$student_id'";
    $result = mysqli_query($conn, $existingLanguagesQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        $existingLanguages[] = $row['clanguages'];
    }
    
    $existingLanguagesQuery = "SELECT languages FROM leetcode WHERE student_id != '$student_id'";
    $result = mysqli_query($conn, $existingLanguagesQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        $existingLanguages[] = $row['languages'];
    }
    
    // Check if any of the posted languages already exist
    foreach ($_POST['hlanguages'] as $value) {
        if (in_array($value, $existingLanguages)) {
            echo "<script>alert('Language $value already exists in HackerRank.'); window.location.href = 'fdisplay.php';</script>";
            exit;
        }
    }
    
    foreach ($_POST['clanguages'] as $value) {
        if (in_array($value, $existingLanguages)) {
            echo "<script>alert('Language $value already exists in CodeChef.'); window.location.href = 'fdisplay.php';</script>";
            exit;
        }
    }
    
    foreach ($_POST['languages'] as $value) {
        if (in_array($value, $existingLanguages)) {
            echo "<script>alert('Language $value already exists in LeetCode.'); window.location.href = 'fdisplay.php';</script>";
            exit;
        }
    }
    

    // If the language doesn't exist, proceed with insertion
    // Insert data for CodeChef languages
    if (!empty($_POST['clanguages'])) {
        foreach ($_POST['clanguages'] as $key => $value) {
            if (!empty($value) && isset($_POST['crank'][$key]) && isset($_POST['cpoint'][$key]) && isset($_POST['cnumber'][$key])) {
                $c_languages = mysqli_real_escape_string($conn, $value);
                $c_rank = mysqli_real_escape_string($conn, $_POST['crank'][$key]);
                $c_points = mysqli_real_escape_string($conn, $_POST['cpoint'][$key]);
                $c_number = mysqli_real_escape_string($conn, $_POST['cnumber'][$key]);

                $cquery = "INSERT INTO codechef (clanguages, crank, cpoint, cnumber, student_id) VALUES ('$c_languages', '$c_rank', '$c_points', '$c_number', '$student_id')";
                $query_run = mysqli_query($conn, $cquery);
            }
        }
    }

    // Insert data for HackerRank languages
    if (!empty($_POST['hlanguages'])) {
        foreach ($_POST['hlanguages'] as $key => $value) {
            if (!empty($value) && isset($_POST['hrank'][$key]) && isset($_POST['hpoint'][$key]) && isset($_POST['hnumber'][$key])) {
                $h_languages = mysqli_real_escape_string($conn, $value);
                $h_rank = mysqli_real_escape_string($conn, $_POST['hrank'][$key]);
                $h_points = mysqli_real_escape_string($conn, $_POST['hpoint'][$key]);
                $h_number = mysqli_real_escape_string($conn, $_POST['hnumber'][$key]);

                $hquery = "INSERT INTO hackerrank (hlanguages, hrank, hpoint, hnumber, student_id) VALUES ('$h_languages', '$h_rank', '$h_points', '$h_number', '$student_id')";
                $query_run = mysqli_query($conn, $hquery);
            }
        }
    }

    // Insert data for LeetCode languages
    if (!empty($_POST['languages'])) {
        foreach ($_POST['languages'] as $key => $value) {
            if (!empty($value) && isset($_POST['lrank'][$key]) && isset($_POST['lpoint'][$key]) && isset($_POST['lnumber'][$key])) {
                $l_languages = mysqli_real_escape_string($conn, $value);
                $l_rank = mysqli_real_escape_string($conn, $_POST['lrank'][$key]);
                $l_points = mysqli_real_escape_string($conn, $_POST['lpoint'][$key]);
                $l_number = mysqli_real_escape_string($conn, $_POST['lnumber'][$key]);

                $lquery = "INSERT INTO leetcode (languages, lrank, lpoint, lnumber, student_id) VALUES ('$l_languages', '$l_rank', '$l_points', '$l_number', '$student_id')";
                $query_run = mysqli_query($conn, $lquery);
            }
        }
    }

    // Check if the insertion was successful
    if ($query_run) {
        echo "<script>alert('All language details successfully submitted.'); window.location.href = 'fdisplay.php';</script>";
    } else {
        echo "<script>alert('Failed to submit language details.'); window.location.href = 'fdisplay.php';</script>";
    }
}
?>
