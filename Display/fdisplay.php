<?php
session_start();
if(!(isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true) {
    header('Location: login.php');
    exit(); // Exit to prevent further execution
} else {
    include('connection.php');
    $student_id = mysqli_real_escape_string($conn, $_SESSION["account"]);
    
    $check = "SELECT * FROM personalinformation WHERE student_id =  '$student_id'";
    $query = mysqli_query($conn, $check);
    $rows = mysqli_num_rows($query);

    if($rows == 0) {
        // Redirect to form.php if no details are found
        echo "<script>alert('Please fill details first'); setTimeout(function(){ window.location.href = 'form.php'; }, 1000);</script>";
        
        exit(); // Exit to prevent further execution
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body {
            margin: 0;
            font-family:Arial, Helvetica, sans-serif;
        }


        .navbar {
  background: #2c3e50; /* Dark blue color */
  padding: 10px;
  height:37px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.navbar button {
  margin-top: 4px;  
  margin-right: 660px;
  border: none;
  height:30px;
  background: transparent;
  color: #fff; /* White color */
  font-size: 16px;
  cursor: pointer;
  transition: color 0.3s ease; /* Smooth color transition */
}

.navbar button:hover {
  background-color: grey;
  border-radius: 2px;
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

/* Style for the button */
.button {
  display: inline-block;
  padding: 10px 20px; /* Adjust padding as needed */
  background: #435787; /* Green background color */
  color: white;
  text-align: center;
  text-decoration: none;
  color:black;
  border: none;
  border-radius: 5px; /* Rounded corners */
  cursor: pointer;
  margin-left: 10px;
  width:50px;
}

.button a{
    color:white;
    text-decoration: none;

}

/* Hover effect */
.button:hover {
  background-color: grey; /* Darker green on hover */
}

/* Active effect */
.button:active {
  background-color: blue; /* Darker background color when clicked */
}


    </style>
</head>
<body>
<div class="navbar">
        <button type="button" name="nav" id="nav" onclick="logout()" class="btn btn-secondary">Log Out</button>
        <button type="button" name="nav" id="nav" onclick="form1()" class="btn btn-secondary">Form</button>
        <div class="user-icon">
    <i class="fas fa-user"></i>
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
        </div>
    </div>

    <script>
        function logout() {
            // Redirect to logout.php
            window.location.href = "logout.php";
        }
        function form1() {
            console.log('hi');
            window.location.href = "form.php";
        }
    </script>

    <?php
    // Display a message if no details are found
    if($rows == 0) {
        echo "<p>Please fill in your details first.</p>";
    } else {
        
        $student_id = $_SESSION['account'];

// Fetch student data from the database
$sql = "SELECT * FROM personalinformation WHERE student_id ='$student_id' ";
$sql1 = "SELECT * FROM technologystand WHERE student_id ='$student_id' ";
$sql2 = "SELECT * FROM codechef WHERE student_id ='$student_id' ";
$sql3 = "SELECT * FROM  hackerrank WHERE student_id ='$student_id' ";
$sql4 = "SELECT * FROM leetcode WHERE student_id ='$student_id' ";
$sql5 = "SELECT * FROM nptel WHERE student_id ='$student_id' ";
$sql6 = "SELECT * FROM professionalcourses WHERE student_id ='$student_id' ";
$sql7 = "SELECT * FROM research WHERE student_id ='$student_id' ";

$result = mysqli_query($conn, $sql);
$techno_stand = mysqli_query($conn, $sql1);
$codechef=mysqli_query($conn, $sql2);
$hackerrank=mysqli_query($conn, $sql3);
$leetcode=mysqli_query($conn, $sql4);
$nptel=mysqli_query($conn, $sql5);
$professional=mysqli_query($conn, $sql6);
$research=mysqli_query($conn, $sql7);

$num = mysqli_num_rows($result);

// Start styling the output

    echo '<div style="margin-top:-15px;background-color: #e3f1fa; padding: 0px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Display student data
       echo "<h2 style='color: #2c3e50; margin-top: 20px; text-align: center;'>Student Information</h2>";
        echo '<table style="width:100%; border-collapse: collapse;  border: 2px solid #ddd;">'; // Start table

        // Grouping details in one row
        echo "<tr style='background: #2c3e50;color : white'>";

        echo "<td colspan='10' style='padding: 10px'><strong>Personal Details</strong></td>";
        
        // Personal Details
        echo "<tr>";
        echo "<td style='padding: 10px;'><strong>Full Name : </strong>" . ($row["fullname"] != null ? $row["fullname"] : "NA") . "</td>";
        echo "<td style='padding: 10px;'><strong>Email : </strong>" . ($row["email"] != null ? $row["email"] : "NA") . "</td>";
        echo "<td style='padding: 10px;'><strong>Ph.number : </strong>" . ($row["contactnumber"] != null ? $row["contactnumber"] : "NA") . " </td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td style='padding: 10px;'><strong>Result HSC : </strong>" . ($row["result_hsc"] != null ? $row["result_hsc"] : "NA") . "%</td>";
        echo "<td style='padding: 10px;'><strong>Merit Rank : </strong>" . ($row["meritrank"] != null ? $row["meritrank"] : "NA") . "</td>";
        echo "<td style='padding: 10px;'><strong>Medium : </strong>" . ($row["medium"] != null ? $row["medium"] : "NA") . "</td>";
        echo "</tr>";
        
        
        echo "<tr>";
        echo "<td style='padding: 10px;'><strong>Admission Type : </strong>" . ($row["admissiontype"] != null ? $row["admissiontype"] : "NA") . "</td>";
        echo "<td style='padding: 10px;'><strong>Counsellor : </strong>" . ($row["counsellor"] != null ? $row["counsellor"] : "NA") . "</td>";
        echo "<td style='padding: 10px;'><strong>Current Semester : </strong>" . ($row["currentsemester"] != null ? $row["currentsemester"] : "-") . "</td>";
        echo "</tr>";
        
        echo "<td class='button' style='padding: 10px; margin-bottom:15px '><a href='editpersonalinfo.php?id=$row[student_id]'>Edit</a>";
        echo "</table>"; // Close table
        
        echo "<table style='width:100%; border-collapse: collapse; border: 1px solid #ddd;'>";   
        echo "<tr style='background: #2c3e50;color : white'>";
        
        echo "<td colspan='10' style='padding: 10px;'><strong>Academic Details</strong></td>";
        echo "</tr>";
        
        echo "<tr>";
            echo "<td style='padding: 10px; font-size:20px; color : #2020cf'><strong>Semester wise CGPA</strong></td> ";
        echo "</tr>";   
        
        echo "<tr>";
        $i=1;
        $num=$row["currentsemester"];
        while($i<$num)
        {
            echo "<td style='padding: 10px;'><strong>Sem $i :</strong> " . $row["sem$i"]  . "</td>";
            if($i%4==0)
            {
                echo "</tr>";
                echo "<tr>";
            }
            $i++;
        }
        echo "</tr>";
        
        echo "<tr>";
            echo "<td style='padding: 10px; font-size:20px; color : #2020cf'><strong>Year wise CGPA</strong></td> ";
            echo "</tr>";   

        echo "<tr>";
        for($i=1;$i<$num/2;$i++)
        {
            echo "<td style='padding: 10px;'><strong>Year $i :</strong> " . $row["year$i"]  . "</td>";
        }
        echo "</tr>";
        echo "<tr>";

        
        echo "<tr>";
            echo "<td style='padding: 10px; font-size:20px; color : #2020cf'><strong>Career Option</strong></td> ";
        echo "</tr>";   

        echo "<tr>";
        echo "<td style='padding: 10px;'><strong>Career Choice : </strong>" . ($row["interest"] != null ? $row["interest"] : "NA") . "</td>";
        echo"</tr>";
        echo "<td  class='button' style='padding: 10px; margin-bottom:15px'><a href='editacadamicinfo.php?id=$row[student_id]'>Edit</a>";
        echo "</table>";

    }
        while($row1= $techno_stand->fetch_assoc())
        {
            echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; border: 2px solid #ddd;">'; // Start table
    
            // Grouping details in one row
            echo "<tr style='background: #2c3e50;color : white'>";
            echo "<td colspan='10' style='background: #2c3e50; padding: 10px'><strong>Technology stand</strong></td>";
    
            // Personal Details
            echo "<tr>";
            echo "<td style='padding: 10px;font-size:20px; color : #2020cf'><strong>* Score out of 5 </strong></td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Competative Programming : </strong>" . ($row1["cp"] != null ? $row1["cp"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Web Development : </strong>" . ($row1["web"] != null ? $row1["web"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Artificial intelligence : </strong>" . ($row1["ai"] != null ? $row1["ai"] : "NA") . "</td>";            
            echo "<td style='padding: 10px;'><strong>Android Programming : </strong>" . ($row1["android"] != null ? $row1["android"] : "NA") . "</td>";
            echo "</tr>";
          
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Other field : </strong>" . ($row1["otherfield"] != null ? $row1["otherfield"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Score of other field : </strong>" . ($row1["any_score"] != null ? $row1["any_score"] : "NA") . "</td>";
            echo "</tr>";
           
           
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Prefered Technology : </strong>" . ($row1["prefer"] != null ? $row1["prefer"] : "NA") . "</td>";
            echo "</tr>";
    
            echo "<td class='button' style='padding: 10px; margin-bottom:15px'><a href='editechnologystand.php?id=$student_id'>Edit</a></td>";
           

    
            echo "</table>";
        }
    
    
        echo '<table style="width:100%; border-collapse: collapse;  border: 2px solid #ddd;">'; // Start tabl

        // Grouping details in one row
        echo "<tr style='background: #2c3e50;color : white'>";
        echo "<td colspan='10' style='padding: 10px'><strong>Technical Details</strong></td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td colspan='2' style='padding: 10px; font-size:20px; color: #2020cf;'><strong>Codechef Details</strong></td>";
        echo "</tr>";
        
        while ($row1 = $codechef->fetch_assoc()) {
            // Personal Details
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Language :</strong> " . ($row1["clanguages"] != null ? $row1["clanguages"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Rank :</strong> " . ($row1["crank"] != null ? $row1["crank"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Points :</strong> " . ($row1["cpoint"] != null ? $row1["cpoint"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Problem Solved :</strong> " . ($row1["cnumber"] != null ? $row1["cnumber"] : "NA") . "</td>";
            echo "</tr>";
        }
        
        echo "</table>"; // Close table
          
        echo '<table style="width:100%; border-collapse: collapse;">'; // Start table
        
        // Grouping details in one row
        // echo "<tr style='background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);color : white'>";   
        // echo "<td colspan='10' style='padding: 10px'><strong>HackerRank Details</strong></td>";
        // echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' style='padding: 10px; font-size:20px; color: #2020cf;'><strong>Hackerrank Details</strong></td>";
        echo "</tr>";
        while ($row1 = $hackerrank->fetch_assoc()) {
            // Personal Details
            
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Language :</strong>  "  . ($row1["hlanguages"] != null ? $row1["hlanguages"] : "NA") .  "</td>";
            echo "<td style='padding: 10px;'><strong>Rank :</strong> " . ($row1["hrank"] != null ? $row1["hrank"] : "NA") .  "</td>";
            echo "<td style='padding: 10px;'><strong>Points :</strong> " . ($row1["hpoint"] != null ? $row1["hpoint"] : "NA") .  "</td>";
            echo "<td style='padding: 10px;'><strong>Problem Solved :</strong> " . ($row1["hnumber"] != null ? $row1["hnumber"] :  "NA") . "</td>";
            echo "</tr>";
        }
        
        echo "</table>"; // Close table
        
    
        echo '<table style="width:100%; border-collapse: collapse; border: 2px solid #ddd;">'; // Start table

        // Grouping details in one row
        echo "<tr style='background-color: blue;'>";
        // echo "<tr style='background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b);color : white'>";

        // echo "<td colspan='10' style='padding: 10px'><strong>Leetcode Details</strong></td>";
        // echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' style='padding: 10px; font-size:20px; margin-bottom: 20px; color: #2020cf;'><strong>Leetcode Details</strong></td>";
        echo "</tr>";
        while ($row1 = $leetcode->fetch_assoc()) {
            // Personal Details
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Language :</strong> " . ($row1["languages"] != null ? $row1["languages"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Rank :</strong> " . ($row1["lrank"] != null ? $row1["lrank"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Points :</strong> " . ($row1["lpoint"] != null ? $row1["lpoint"] : "NA") . "</td>";
            echo "<td style='padding: 10px;'><strong>Problem Solved :</strong> " . ($row1["lnumber"] != null ? $row1["lnumber"] : "NA") . "</td>";
            echo "</tr>";
        }
        echo "<td  class='button' style='padding: 10px; margin-bottom:15px'><a href='editcodingplatform.php?id=$student_id'>Edit</a>";
       
        echo "</table>"; // Close table

        
        echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; ">'; // Start table

        // Grouping details in one row
        echo "<tr style='background: #2c3e50;color : white'>";
        echo "<td colspan='2' style='padding: 10px'><strong>Courses Details</strong></td>";
        echo "</tr>";

        echo '<tr>';
        echo "<td class='button' style='padding: 10px; margin-bottom:10px; margin-top:10px '><a href='addcourse.php?id=$student_id'>ADD</a></td>";
       echo '</tr>';
       
        
        // NPTEL Courses
        echo "<tr>";
        echo "<td colspan='2' style='padding: 10px; font-size:20px; color: #2020cf'><strong>NPTEL</strong></td>";
        echo "</tr>";
        
        while ($row1 = $nptel->fetch_assoc()) {
            // NPTEL Course Details
            echo "<tr>";
            echo "<td style='padding: 10px 5px;'><strong>Course Title :</strong> " . ($row1["nptelcourses"] != null ? $row1["nptelcourses"] : "NA") . "</td>";
            echo "<td style='padding: 10px 5px;'><strong>Score :</strong> " . ($row1["nscore"] != null ? $row1["nscore"] : "NA") . "</td>";
            echo "</tr>";
        }
        
        // Professional Courses
        echo "<tr>";
        echo "<td colspan='2' style='padding: 10px;font-size:20px; color: #2020cf'><strong>Professional Courses</strong></td>";
        echo "</tr>";
        
        
        while ($row2 = $professional->fetch_assoc()) {
            // Professional Course Details
            echo "<tr>";
            echo "<td style='padding: 10px 5px;'><strong>Course Title :</strong> " . ($row2["course"] != null ? $row2["course"] : "NA") . "</td>";
            echo "<td style='padding: 10px 5px;'><strong>Score :</strong> " . ($row2["result"] != null ? $row2["result"] : "NA") . "</td>";
            echo "</tr>";
        }

        echo "<tr>";
        echo "<td colspan='2' style='padding: 10px; font-size:20px; color: #2020cf'><strong>Project / Research paper</strong></td>";
        echo "</tr>";
        
        while ($row2 = $research->fetch_assoc()) {
            // Professional Course Details
            echo "<tr>";
            echo "<td style='padding: 10px 5px;'><strong>Title:</strong> " . ($row2["project"] != null ? $row2["project"] : "NA") . "</td>";
            echo "<td style='padding: 10px 5px;'><strong>Used technology :</strong> " . ($row2["tech"] != null ? $row2["tech"] : "NA") . "</td>";
            echo "</tr>";
        }
        echo "<td class='button' style='padding: 10px; margin-bottom:15px'><a href='editcourses.php?id=$student_id'>Edit</a></td>";
         
        echo "</table>"; // Close table
        // if any variable is null the print  NA insteasd of null
    }
    ?>
</body>
</html>
