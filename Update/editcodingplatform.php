<?php
session_start();
if (!(isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true) {
    header('Location:index.php');
    exit; // Added exit to stop further execution
} else {
    include('connection.php');
    $id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>Student CRUD</title>

</head>
<style>
body {
  margin: 0;
  font-family: 'Roboto', sans-serif; /* Use Roboto font for better readability */
  background-color :gainsboro; /* Light grayish-blue background */
  color: #333; /* Dark gray text color */
}

.navbar {
  background: #2c3e50; /* Dark blue color */
  padding: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.navbar button {
  margin-right: 10px;
  border: none;
  background: transparent;
  color: #fff; /* White color */
  font-size: 16px;
  cursor: pointer;
  transition: color 0.3s ease; /* Smooth color transition */
}

.navbar button:hover {
  color: #fff; /* Change color on hover */
}

.user-icon {
  border-radius: 50%;
  background-color:azure; /* Dark blue color */
  width: 40px;
  height: 40px;
  text-align: center;
  line-height: 40px;
  font-size: 20px;
  color: #2c3e50; /* White color */
  float: right;
  margin-right: 10px;
}

.card-header {
  color: #fff; /* White color */
  background: #2c3e50; /* Dark blue color */
  width: 100%;
  text-align: center;
  height: 60px; /* Set the height to match the container */
}

.container {
  /* Add margin at the bottom of each container */
  /* background: #fff; Dark blue color */
  min-height: 50px; /* Set a minimum height to ensure it matches the header */
}


.main-form {
  padding: 20px;
  border-radius: 5px;
}

label {
  font-weight: bold;
  color: #2c3e50; /* Dark blue color */
}

.btn-secondary {
  background-color: #2c3e50; /* Dark blue color */
  border-color: #2c3e50; /* Dark blue color */
  color: #fff; /* White color */
  font-weight: bold;
}

.btn-secondary:hover {
  background-color: #34495e; /* Slightly darker blue color on hover */
  border-color: #34495e; /* Slightly darker blue color on hover */
  font-weight: bold;

}

@media (max-width: 768px) {
  .container {
    margin-top: 50px;
  }
}
</style>
</head>
<body>
    
<div class="navbar">
        <button type="button" name="nav" id="nav" onclick="logout()" class="btn btn-secondary">Log Out</button>
        <button type="button" name="nav" id="nav" onclick="display()" class="btn btn-secondary">View</button>
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
    function display() {
  // Redirect to logout.php
  window.location.href = "fdisplay.php";
}
    </script>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Codechef details 
                         <button type="button" class="btn btn-warning float-end" data-toggle="modal" data-target="#codechefModal"> ADD Codechef </button>
                    </h4>
                </div>
                <div id="displayDataTable"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="codechefModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="codechefModal">Codechef</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="codecheflanguage">Language</label>
                    <select class="custom-select" id="codecheflanguage" name="clanguages">
                        <option value="" disabled selected>Select</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="codechefrank">Rank</label>
                    <input type="number" id="codechefrank" name="crank[]" class="form-control" placeholder="Enter Rank">
                </div>
                <div class="form-group mb-2">
                    <label for="codechefpoint">Points</label>
                    <input type="number" id="codechefpoint" name="cpoint[]" class="form-control" placeholder="Enter Points">
                </div>
                <div class="form-group mb-2">
                    <label for="codechefnumber">Problem Solved</label>
                    <input type="number" id="codechefnumber" name="cnumber[]" class="form-control" placeholder="Number of problems solved">
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-dark" onclick="addcodechef()" name="save">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>HackerRank details
                         <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#HackerRankModal"> ADD HackerRank </button>
                    </h4>
                </div>
                <div id="displayHackerRankTable"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="HackerRankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="HackerRankModal">HackerRank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="HackerRanklanguage">Language</label>
                    <select class="custom-select" id="HackerRanklanguage" name="hlanguages">
                        <option value="" disabled selected>Select</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="HackerRankrank">Rank</label>
                    <input type="number" id="HackerRankrank" name="hrank[]" class="form-control" placeholder="Enter Rank">
                </div>
                <div class="form-group mb-2">
                    <label for="HackerRankpoint">Points</label>
                    <input type="number" id="HackerRankpoint" name="hpoint[]" class="form-control" placeholder="Enter Points">
                </div>
                <div class="form-group mb-2">
                    <label for="HackerRanknumber">Problem Solved</label>
                    <input type="number" id="HackerRanknumber" name="hnumber[]" class="form-control" placeholder="Number of problems solved">
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-dark" onclick="addHackerRank()" name="save">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Leetcode details 
                         <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#LeetcodeModal"> ADD Leetcode </button>
                    </h4>
                </div>
                <div id="displayLeetcodeTable"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="LeetcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LeetcodeModal">Leetcode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Leetcodelanguage">Language</label>
                    <select class="custom-select" id="Leetcodelanguage" name="languages">
                        <option value="" disabled selected>Select</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="HackerRankrank">Rank</label>
                    <input type="number" id="Leetcoderank" name="lrank[]" class="form-control" placeholder="Enter Rank">
                </div>
                <div class="form-group mb-2">
                    <label for="HackerRankpoint">Points</label>
                    <input type="number" id="Leetcodepoint" name="lpoint[]" class="form-control" placeholder="Enter Points">
                </div>
                <div class="form-group mb-2">
                    <label for="HackerRanknumber">Problem Solved</label>
                    <input type="number" id="Leetcodenumber" name="lnumber[]" class="form-control" placeholder="Number of problems solved">
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-dark" onclick="addLeetcode()" name="save">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<script>

   $(document).ready(function(){
    Displaycodechef();
    DisplayHackerRank();
    DisplayLeetcode();
   });


   function Displaycodechef() {
       var displayData='true';


       $.ajax({
        url:"displayCodechef.php",
        type:'post',
        data:{
             displaySend:displayData,
        },
        success:function(data,status){  //call back function
            console.log("reach there");
            $('#displayDataTable').html(data);
        }
       })
   }

   function DisplayHackerRank()
    {
       var displayData='true';


       $.ajax({
        url:"displayHackerRank.php",
        type:'post',
        data:{
             displaySend:displayData,
        },
        success:function(data,status){  //call back function
            console.log("reach there");
            $('#displayHackerRankTable').html(data);
        }
       })
   }

   function DisplayLeetcode()
    {
       var displayData='true';


       $.ajax({
        url:"displayLeetcode.php",
        type:'post',
        data:{
             displaySend:displayData,
        },
        success:function(data,status){  //call back function
            console.log("reach there");
            $('#displayLeetcodeTable').html(data);
        }
       })
   }

    function addcodechef() {

        console.log("Add Codechef function called.");

        var language = document.getElementById("codecheflanguage").value;
        var rank = document.getElementById("codechefrank").value;
        var point = document.getElementById("codechefpoint").value;
        var number = document.getElementById("codechefnumber").value;
        var id = '<?php echo $id; ?>'; // Get the PHP value of $id

        console.log(language, rank, point, number,id);
        console.log("Add Codechef ajax function called.");

        $.ajax({
            url: "addCodechef.php",
            type: 'post',
            data: {
                clanguage: language,
                crank: rank,
                cpoint: point,
                cnumber: number,
                id:id
            },
            success: function (data, status) {
                 console.log("Now calling...");
                 Displaycodechef();
            }
        });
    }

    function addHackerRank() {

        console.log("Add Codechef function called.");

        var language = document.getElementById("HackerRanklanguage").value;
        var rank = document.getElementById("HackerRankrank").value;
        var point = document.getElementById("HackerRankpoint").value;
        var number = document.getElementById("HackerRanknumber").value;
        var id = '<?php echo $id; ?>'; // Get the PHP value of $id

        console.log(language, rank, point, number,id);
        console.log("Add HackerRank ajax function called.");

        $.ajax({
            url: "addHackerRank.php",
            type: 'post',
            data: {
                hlanguage: language,
                hrank: rank,
                hpoint: point,
                hnumber: number,
                id:id
            },
            success: function (data, status) {
                 console.log("Now calling...");
                 DisplayHackerRank();
            }
        });
    }
    function addLeetcode() {

        console.log("Add leetcode function called.");

        var language = document.getElementById("Leetcodelanguage").value;
        var rank = document.getElementById("Leetcoderank").value;
        var point = document.getElementById("Leetcodepoint").value;
        var number = document.getElementById("Leetcodenumber").value;
        var id = '<?php echo $id; ?>'; // Get the PHP value of $id

        console.log(language, rank, point, number,id);
        console.log("Add Leetcode ajax function called.");

        $.ajax({
            url: "addLeetcode.php",
            type: 'post',
            data: {
                language: language,
                lrank: rank,
                lpoint: point,
                lnumber: number,
                id:id
            },
            success: function (data, status) {
                 console.log("Now calling...");
                 DisplayLeetcode();
            }
        });
    }
</script>
</body>
</html>
