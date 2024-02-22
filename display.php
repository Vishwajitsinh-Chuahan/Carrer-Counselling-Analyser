<?php
include('connection.php');

// Assuming you receive the student ID through a GET parameter
$student_id = "22cs009";

// Fetch student data from the database
$sql = "SELECT * FROM personalinformation WHERE idnumber ='22cs009' ";
$sql1 = "SELECT * FROM technologystand WHERE idnumber ='22cs009' ";
$sql2 = "SELECT * FROM codechef WHERE idnumber ='22cs009' ";
$sql3 = "SELECT * FROM  hackerrank WHERE idnumber ='22cs009' ";
$sql4 = "SELECT * FROM leetcode WHERE idnumber ='22cs009' ";
$sql5 = "SELECT * FROM nptel WHERE idnumber ='22cs009' ";
$sql6 = "SELECT * FROM professionalcourses WHERE idnumber ='22cs009' ";

$result = mysqli_query($conn, $sql);
$techno_stand = mysqli_query($conn, $sql1);
$codechef=mysqli_query($conn, $sql2);
$hackerrank=mysqli_query($conn, $sql3);
$leetcode=mysqli_query($conn, $sql4);
$nptel=mysqli_query($conn, $sql5);
$professional=mysqli_query($conn, $sql6);

$num = mysqli_num_rows($result);

// Start styling the output
echo '<div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 0px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Display student data
        echo "<center><h2 style='color: blue;'>Student Information</h2></center>";
        echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; border: 2px solid #ddd;">'; // Start table

        // Grouping details in one row
        echo "<tr style='background-color: #1684e2;color : white'>";
        echo "<td colspan='10' style='padding: 10px'><strong>Personal Details</strong></td>";

        // Personal Details
        echo "<tr>";
        echo "<td style='padding: 10px;'><strong>Full Name : </strong>" . ($row["fullname"] != 0 ? $row["fullname"] : "null") . "</td>";
        echo "<td style='padding: 10px;'><strong>Email : </strong>" . ($row["email"] != 0 ? $row["email"] : "null") . "</td>";
        echo "<td style='padding: 10px;'><strong>Phone number : </strong>" . ($row["contactnumber"] != 0 ? $row["contactnumber"] : "null") . " </td>";
        echo "</tr>";
      
        echo "<tr>";
        echo "<td style='padding: 10px;'><strong>Result HSC : </strong>" . ($row["result_hsc"] != 0 ? $row["result_hsc"] : "null") . "%</td>";
        echo "<td style='padding: 10px;'><strong>Merit Rank : </strong>" . ($row["meritrank"] != 0 ? $row["meritrank"] : "null") . "</td>";
        echo "<td style='padding: 10px;'><strong>Medium : </strong>" . ($row["medium"] != 0 ? $row["medium"] : "null") . "</td>";
        echo "</tr>";
       
       
        echo "<tr>";
        echo "<td style='padding: 10px;'><strong>Admission Type : </strong>" . ($row["admissiontype"] != 0 ? $row["admissiontype"] : "null") . "</td>";
        echo "<td style='padding: 10px;'><strong>ID Number : </strong>" . ($row["idnumber"] != 0 ? $row["idnumber"] : "null") . "</td>";
        echo "<td style='padding: 10px;'><strong>Current Semester : </strong>" . ($row["currentsemester"] != 0 ? $row["currentsemester"] : "-") . "</td>";
        echo "</tr>";

        echo "</table>"; // Close table

        echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; border: 1px solid #ddd;">'; // Start table
        echo "<tr style='background-color: #1684e2;color : white'>";
        echo "<td colspan='10' style='padding: 10px;'><strong>Academic Details</strong></td>";
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
        for($i=1;$i<$num/2;$i++)
        {
            echo "<td style='padding: 10px;'><strong>Year $i :</strong> " . $row["year$i"]  . "</td>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "</table>";

    }
        while($row1= $techno_stand->fetch_assoc())
        {
            echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; border: 2px solid #ddd;">'; // Start table
    
            // Grouping details in one row
            echo "<tr style='background-color: #1684e2;color : white'>";
            echo "<td colspan='10' style='padding: 10px'><strong>Technology stand</strong></td>";
    
            // Personal Details
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Competative Programming : </strong>" . ($row1["cp"] != 0 ? $row1["cp"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Web Development : </strong>" . ($row1["web"] != 0 ? $row1["web"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>AI : </strong>" . ($row1["ai"] != 0 ? $row1["ai"] : "null") . "</td>";            
            echo "<td style='padding: 10px;'><strong>Android Programming:</strong>" . ($row1["android"] != 0 ? $row1["android"] : "null") . "</td>";
            echo "</tr>";
          
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Other field:</strong>" . ($row1["otherfield"] != 0 ? $row1["otherfield"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Score out of 5:</strong>" . ($row1["any_score"] != null ? $row1["any_score"] : "null") . "</td>";
            echo "</tr>";
           
           
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Prefered Technology:</strong>" . ($row1["prefer"] != 0 ? $row1["prefer"] : "null") . "</td>";
            echo "</tr>";
    
            echo "</table>";
        }
    
    
        echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; border: 2px solid #ddd;">'; // Start table

        // Grouping details in one row
        echo "<tr style='background-color: #1684e2;color : white'>";

        echo "<td colspan='10' style='padding: 10px'><strong>Codechef Details</strong></td>";
        echo "</tr>";
        
        while ($row1 = $codechef->fetch_assoc()) {
            // Personal Details
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Language :</strong> " . ($row1["clanguages"] != 0 ? $row1["clanguages"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Rank :</strong> " . ($row1["crank"] != 0 ? $row1["crank"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Points :</strong> " . ($row1["cpoint"] != 0 ? $row1["cpoint"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Problem Solved :</strong> " . ($row1["cnumber"] != 0 ? $row1["cnumber"] : "null") . "</td>";
            echo "</tr>";
        }
        
        echo "</table>"; // Close table
        
    
        echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; border: 2px solid #ddd;">'; // Start table

        // Grouping details in one row
        echo "<tr style='background-color: #1684e2;color : white'>";   
        echo "<td colspan='10' style='padding: 10px'><strong>HackerRank Details</strong></td>";
        echo "</tr>";
        
        while ($row1 = $hackerrank->fetch_assoc()) {
            // Personal Details
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Language :</strong> " . ($row1["hlanguages"] != 0 ? $row1["hlanguages"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Rank :</strong> " . ($row1["hrank"] != 0 ? $row1["hrank"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Points :</strong> " . ($row1["hpoint"] != 0 ? $row1["hpoint"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Problem Solved :</strong> " . ($row1["hnumber"] != 0 ? $row1["hnumber"] : "null") . "</td>";
            echo "</tr>";
        }
        
        echo "</table>"; // Close table
        
    
        echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; border: 2px solid #ddd;">'; // Start table

        echo "<tr style='background-color: #f0f0f0;'>";
        echo "<tr style='background-color: #1684e2;color : white'>";

        echo "<td colspan='10' style='padding: 10px'><strong>Leetcode Details</strong></td>";
        echo "</tr>";
        
        while ($row1 = $leetcode->fetch_assoc()) {
            // Personal Details
            echo "<tr>";
            echo "<td style='padding: 10px;'><strong>Language :</strong> " . ($row1["languages"] != 0 ? $row1["languages"] : "-") . "</td>";
            echo "<td style='padding: 10px;'><strong>Rank :</strong> " . ($row1["lrank"] != 0 ? $row1["lrank"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Points :</strong> " . ($row1["lpoint"] != 0 ? $row1["lpoint"] : "null") . "</td>";
            echo "<td style='padding: 10px;'><strong>Problem Solved :</strong> " . ($row1["lnumber"] != 0 ? $row1["lnumber"] : "null") . "</td>";
            echo "</tr>";
        }
        echo "</table>"; // Close table


        echo '<table style="width:100%; border-collapse: collapse; margin-bottom: 20px; border: 2px solid #ddd;">'; // Start table

        // Grouping details in one row
        echo "<tr style='background-color: #1684e2;color : white'>";
        echo "<td colspan='2' style='padding: 10px'><strong>Courses Details</strong></td>";
        echo "</tr>";
        
        // NPTEL Courses
        echo "<tr>";
        echo "<td colspan='2' style='padding: 10px; color: #FF0000'><strong>NPTEL</strong></td>";
        echo "</tr>";
        
        while ($row1 = $nptel->fetch_assoc()) {
            // NPTEL Course Details
            echo "<tr>";
            echo "<td style='padding: 10px 5px;'><strong>Course Name :</strong> " . ($row1["nptelcourses"] != 0 ? $row1["nptelcourses"] : "null") . "</td>";
            echo "<td style='padding: 10px 5px;'><strong>Score :</strong> " . ($row1["nscore"] != 0 ? $row1["nscore"] : "null") . "</td>";
            echo "</tr>";
        }
        
        // Professional Courses
        echo "<tr>";
        echo "<td colspan='2' style='padding: 10px; color: #FF0000'><strong>Professional Courses</strong></td>";
        echo "</tr>";
        
        while ($row2 = $professional->fetch_assoc()) {
            // Professional Course Details
            echo "<tr>";
            echo "<td style='padding: 10px 5px;'><strong>Course Name :</strong> " . ($row2["course"] != 0 ? $row2["course"] : "null") . "</td>";
            echo "<td style='padding: 10px 5px;'><strong>Score :</strong> " . ($row2["result"] != 0 ? $row2["result"] : "null") . "</td>";
            echo "</tr>";
        }
        
        echo "</table>"; // Close table
        