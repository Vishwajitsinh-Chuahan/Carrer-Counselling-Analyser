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
                         <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#codechefModal"> ADD Codechef </button>
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
                <button type="submit" class="btn btn-dark" onclick="addcodechef()">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
    </div>
</div>
</div>

<!-- Updatecodechef Modal -->
<div class="modal fade" id="updatecodechefModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatecodechefModal">Update Codechef Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="updatecodecheflanguage">Language</label>
                    <select class="custom-select" id="updatecodecheflanguage" name="clanguages">
                        <option value="" disabled selected>Select</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="updatecodechefrank">Rank</label>
                    <input type="number" id="updatecodechefrank" name="crank[]" class="form-control" placeholder="Enter Rank">
                </div>
                <div class="form-group mb-2">
                    <label for="updatecodechefpoint">Points</label>
                    <input type="number" id="updatecodechefpoint" name="cpoint[]" class="form-control" placeholder="Enter Points">
                </div>
                <div class="form-group mb-2">
                    <label for="updatecodechefnumber">Problem Solved</label>
                    <input type="number" id="updatecodechefnumber" name="cnumber[]" class="form-control" placeholder="Number of problems solved">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" onclick="updateC()">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" id="updatecodechefhidden">

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
                         <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#leetcodeModal"> ADD Leetcode </button>
                    </h4>
                </div>
                <div id="displayLeetcodeTable"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="leetcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leetcodeModal">Leetcode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="leetcodelanguage">Language</label>
                    <select class="custom-select" id="leetcodelanguage" name="languages">
                        <option value="" disabled selected>Select</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="codechefrank">Rank</label>
                    <input type="number" id="leetcoderank" name="lrank[]" class="form-control" placeholder="Enter Rank">
                </div>
                <div class="form-group mb-2">
                    <label for="codechefpoint">Points</label>
                    <input type="number" id="leetcodepoint" name="lpoint[]" class="form-control" placeholder="Enter Points">
                </div>
                <div class="form-group mb-2">
                    <label for="codechefnumber">Problem Solved</label>
                    <input type="number" id="leetcodenumber" name="lnumber[]" class="form-control" placeholder="Number of problems solved">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" onclick="addLeetcode()">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
    </div>
</div>
</div>

<!-- Updatecodechef Modal -->
<div class="modal fade" id="updateleetcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateleetcodeModal">Update Leetcode Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="updateleetcodelanguage">Language</label>
                    <select class="custom-select" id="updateleetcodelanguage" name="languages">
                        <option value="" disabled selected>Select</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="updateleetcoderank">Rank</label>
                    <input type="number" id="updateleetcoderank" name="lrank[]" class="form-control" placeholder="Enter Rank">
                </div>
                <div class="form-group mb-2">
                    <label for="updateleetcodepoint">Points</label>
                    <input type="number" id="updateleetcodepoint" name="lpoint[]" class="form-control" placeholder="Enter Points">
                </div>
                <div class="form-group mb-2">
                    <label for="updateleetcodenumber">Problem Solved</label>
                    <input type="number" id="updateleetcodenumber" name="lnumber[]" class="form-control" placeholder="Number of problems solved">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" onclick="updateL()">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" id="updateleetcodehidden">
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
                         <button type="button" class="btn btn-success float-end" data-toggle="modal" data-target="#hackerrankModal"> ADD HackerRank </button>
                    </h4>
                </div>
                <div id="displayHackerRankTable"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hackerrankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hackerrankModal">Hackerrank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="hackerranklanguage">Language</label>
                    <select class="custom-select" id="hackerranklanguage" name="hlanguages">
                        <option value="" disabled selected>Select</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="hackerrankrank">Rank</label>
                    <input type="number" id="hackerrankrank" name="hrank[]" class="form-control" placeholder="Enter Rank">
                </div>
                <div class="form-group mb-2">
                    <label for="hackerrankpoint">Points</label>
                    <input type="number" id="hackerrankpoint" name="hpoint[]" class="form-control" placeholder="Enter Points">
                </div>
                <div class="form-group mb-2">
                    <label for="hackerranknumber">Problem Solved</label>
                    <input type="number" id="hackerranknumber" name="hnumber[]" class="form-control" placeholder="Number of problems solved">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" onclick="addHackerrank()">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
    </div>
</div>
</div>

<!-- Updatecodechef Modal -->
<div class="modal fade" id="updatehackerrankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatehackerrankModal">Update Hackerrank Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="updatehackerranklanguage">Language</label>
                    <select class="custom-select" id="updatehackerranklanguage" name="hlanguages">
                        <option value="" disabled selected>Select</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="updatehackerrankrank">Rank</label>
                    <input type="number" id="updatehackerrankrank" name="hrank[]" class="form-control" placeholder="Enter Rank">
                </div>
                <div class="form-group mb-2">
                    <label for="updatehackerrankpoint">Points</label>
                    <input type="number" id="updatehackerrankpoint" name="hpoint[]" class="form-control" placeholder="Enter Points">
                </div>
                <div class="form-group mb-2">
                    <label for="updatehackerranknumber">Problem Solved</label>
                    <input type="number" id="updatehackerranknumber" name="hnumber[]" class="form-control" placeholder="Number of problems solved">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" onclick="updateH()">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" id="updatehackerrankhidden">
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
    DisplayLeetcode();
    DisplayHackerRank();
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
            $('#displayDataTable').html(data); 
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
            // console.log("reach there");
            $('#displayLeetcodeTable').html(data);
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
            // console.log("reach there");
            $('#displayHackerRankTable').html(data);
        }
       })
   }

  
   function addcodechef() {

        // console.log("Add Codechef function called.");
                                                     
        // var number = $('#codechefnumber').val();   where 'codechefnumber' is id of input
        var language = document.getElementById("codecheflanguage").value;
        var rank = document.getElementById("codechefrank").value;
        var point = document.getElementById("codechefpoint").value;
        var number = document.getElementById("codechefnumber").value;
        var id = '<?php echo $id; ?>'; // Get the PHP value of $id

        // console.log(language, rank, point, number,id);
        // console.log("Add Codechef ajax function called.");

        $.ajax({
            url: "addCodechef.php",
            type: 'post',
            data: {
                //we are sending as object 
                //key : value
                clanguage: language,
                crank: rank,
                cpoint: point,
                cnumber: number,
                id:id
            },
            success: function (data, status) {
                 /* In the parameter data is refer as data sent by addcodechef.php file
                  * In our cases we don't send any data from addcodechef.php file
                  * because we are not interested in the data 
                  * we are only interested in the success or failure of the operation
                  * so we can check the status parameter instead of data parameter
                  */
                  console.log("Now calling...");
                  if(data==1){
                    //   console.log(data);
                    $('#codechefModal').modal('hide');
                      Displaycodechef();
                    //   $('#codechefModal').trigger('reset');

                  }
                  // but we need to call displaycodechef function to display data in table after inserting data in to table 
            }
        });
    }

    //add leetcode
function addLeetcode() {

// console.log("Add leetcode function called.");

var language = document.getElementById("leetcodelanguage").value;
var rank = document.getElementById("leetcoderank").value;
var point = document.getElementById("leetcodepoint").value;
var number = document.getElementById("leetcodenumber").value;
var id = '<?php echo $id; ?>'; // Get the PHP value of $id

// console.log(language, rank, point, number,id);
// console.log("Add Leetcode ajax function called.");

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
        //  console.log("Now calling...");
         $('#leetcodeModal').modal('hide');
         DisplayLeetcode();
    }
});
}


function addHackerrank() {

// console.log("Add leetcode function called.");

var language = document.getElementById("hackerranklanguage").value;
var rank = document.getElementById("hackerrankrank").value;
var point = document.getElementById("hackerrankpoint").value;
var number = document.getElementById("hackerranknumber").value;
var id = '<?php echo $id; ?>'; // Get the PHP value of $id

console.log(language, rank, point, number,id);
// console.log("Add Leetcode ajax function called.");


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
        //  console.log("Now calling...");
         $('#hackerrankModal').modal('hide');
         DisplayHackerRank();
    }
});
}


    //Delete codechef
    function deleteCodechef(sr_no) {
        // console.log("Deleting codechef with sr_no: " + sr_no);
        $.ajax({
            url: "deleteCodechef.php",
            type: 'post',
            data:{
                  deleteSend:sr_no
            },
            success: function (data, status) {
                Displaycodechef();
            }
        });
    }
    function deleteLeetcode(sr_no) {
        // console.log("Deleting codechef with sr_no: " + sr_no);
        $.ajax({
            url: "deleteLeetcode.php",
            type: 'post',
            data:{
                  deleteSend:sr_no
            },
            success: function (data, status) {
                DisplayLeetcode();
            }
        });
    }
    function deleteHackerRank(sr_no) {
        // console.log("Deleting codechef with sr_no: " + sr_no);
        $.ajax({
            url: "deleteHackerRank.php",
            type: 'post',
            data:{
                  deleteSend:sr_no
            },
            success: function (data, status) {
                DisplayHackerRank();
            }
        });
    }
  
    //Display for Update codechef
    function updateCodechef(sr_no) {
    $('#updatecodechefhidden').val(sr_no); // Set the hidden input value to sr_no
      
    console.log("Updating codechef with sr_no: " +  document.getElementById("updatecodechefhidden").value);
    // AJAX request to fetch data for the specified sr_no
    $.post(
        "updateCodechef.php", 
        { sr_no: sr_no }, 
        function(data, status) {
            var codechef = JSON.parse(data);
            $('#updatecodecheflanguage').val(codechef.clanguages); // Set language
            $('#updatecodechefrank').val(codechef.crank); // Set rank
            $('#updatecodechefpoint').val(codechef.cpoint); // Set points
            $('#updatecodechefnumber').val(codechef.cnumber); // Set number of problems solved
        console.log(codechef);    
        }
    );

    $('#updatecodechefModal').modal('show'); // Show the update modal
}

   function updateC() {
    var sr_no = $('#updatecodechefhidden').val();
    var rank = $('#updatecodechefrank').val();
    var point = $('#updatecodechefpoint').val();
    var number = $('#updatecodechefnumber').val();

    // AJAX to update the record with the provided data
    $.post("updateCodechef.php", {
        sr_no: sr_no,
        rank: rank,
        point: point,
        number: number,
        update: true // Indicate that it's an update operation
    }, function(data, status) {
        $('#updatecodechefModal').modal('hide');
        Displaycodechef();
    });
}


function updateLeetcode(sr_no) {
    $('#updateleetcodehidden').val(sr_no); // Set the hidden input value to sr_no
      
    console.log("Updating leetcode with sr_no: " +  document.getElementById("updateleetcodehidden").value);
    // AJAX request to fetch data for the specified sr_no
    $.post(
        "updateLeetcode.php", 
        { sr_no: sr_no }, 
        function(data, status) {
            var leetcode = JSON.parse(data);
            $('#updateleetcodelanguage').val(leetcode.languages); // Set language
            $('#updateleetcoderank').val(leetcode.lrank); // Set rank
            $('#updateleetcodepoint').val(leetcode.lpoint); // Set points
            $('#updateleetcodenumber').val(leetcode.lnumber); // Set number of problems solved
        console.log(leetcode);    
        }
    );

    $('#updateleetcodeModal').modal('show'); // Show the update modal
}

function updateL() {
    var sr_no = $('#updateleetcodehidden').val();
    var rank = $('#updateleetcoderank').val();
    var point = $('#updateleetcodepoint').val();
    var number = $('#updateleetcodenumber').val();

    // AJAX to update the record with the provided data
    $.post("updateLeetcode.php", {
        sr_no: sr_no,
        rank: rank,
        point: point,
        number: number,
        update: true // Indicate that it's an update operation
    }, function(data, status) {
        $('#updateleetcodeModal').modal('hide');
        DisplayLeetcode();
    });
}
function updateHackerRank(sr_no) {
    $('#updatehackerrankhidden').val(sr_no); // Set the hidden input value to sr_no
      
    // console.log("Updating leetcode with sr_no: " +  document.getElementById("updatehackerrankhidden").value);
    // AJAX request to fetch data for the specified sr_no
    $.post(
        "updateHackerRank.php", 
        { sr_no: sr_no }, 
        function(data, status) {
            var hk = JSON.parse(data);
            $('#updatehackerranklanguage').val(hk.hlanguages); // Set language
            $('#updatehackerrankrank').val(hk.hrank); // Set rank
            $('#updatehackerrankpoint').val(hk.hpoint); // Set points
            $('#updatehackerranknumber').val(hk.hnumber); // Set number of problems solved
        // console.log(hk);    
        }
    );

    $('#updatehackerrankModal').modal('show'); // Show the update modal
}

function updateH() {
    var sr_no = $('#updatehackerrankhidden').val();
    var rank = $('#updatehackerrankrank').val();
    var point = $('#updatehackerrankpoint').val();
    var number = $('#updatehackerranknumber').val();

    // AJAX to update the record with the provided data
    $.post("updateHackerRank.php", {
        sr_no: sr_no,
        rank: rank,
        point: point,
        number: number,
        update: true // Indicate that it's an update operation
    }, function(data, status) {
        $('#updatehackerrankModal').modal('hide');
        DisplayHackerRank();
    });
}


// updateHackerRank
</script>
</body>
</html>
