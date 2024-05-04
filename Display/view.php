<?php
include('connection.php');

$student_id = $_GET["id"];

$check = "SELECT * FROM personalinformation WHERE student_id =  '$student_id'";
$query = mysqli_query($conn, $check);
$rows = mysqli_num_rows($query);

if ($rows == 0) {
    // Redirect to form.php if no details are found
    echo "<script>alert('Please fill details first'); setTimeout(function(){ window.location.href = 'form.php'; }, 1000);</script>";
    exit(); // Exit to prevent further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            /* Text color */
        }

        .container {
            padding: 20px;
            background-color: #fff;
            /* White background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Shadow */
            max-width: 1200px;
            /* Limit container width */
            margin: 20px auto;
            /* Center container */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 2px solid #ddd;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h2 {
            color: #004080;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.5em;
            /* Larger font size */
        }

        h3 {
            color: #4CAF50;
            margin-top: 15px;
            margin-bottom: 5px;
            font-size: 1.2em;
            /* Larger font size */
        }

        .button {
            background: linear-gradient(30deg, #4CAF50, #303F9F, #1976D2);
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #286090;
        }

        /* Custom color for specific headings */
        .section-heading-personal {
            color: #5f9ea0;
            /* Personal Details */
        }

        .section-heading-academic {
            color: #30757a;
            /* Academic Details */
        }

        .section-heading-technology {
            color: #49767b;
            /* Technology stand */
        }

        .section-heading-technical {
            color: #4CAF50;
            /* Technical Details */
        }

        .section-heading-courses {
            color: #1976D2;
            /* Courses Details */
        }

        /* Improved table styling */
        table {
            border: 1px solid #ddd;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Improved section headings */
        .section-heading {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.5em;
        }

        /* Updated button hover effect */
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    // Display a message if no details are found
    if ($rows == 0) {
        echo "<p>Please fill in your details first.</p>";
    } else {
        echo "<div class='container'>";

        // Fetch student data from the database
        $sql = "SELECT * FROM personalinformation WHERE student_id ='$student_id' ";
        $sql1 = "SELECT * FROM technologystand WHERE student_id ='$student_id' ";
        $sql2 = "SELECT * FROM codechef WHERE student_id ='$student_id' ";
        $sql3 = "SELECT * FROM hackerrank WHERE student_id ='$student_id' ";
        $sql4 = "SELECT * FROM leetcode WHERE student_id ='$student_id' ";
        $sql5 = "SELECT * FROM nptel WHERE student_id ='$student_id' ";
        $sql6 = "SELECT * FROM professionalcourses WHERE student_id ='$student_id' ";
        $sql7 = "SELECT * FROM research WHERE student_id ='$student_id' ";

        $result = mysqli_query($conn, $sql);
        $techno_stand = mysqli_query($conn, $sql1);
        $codechef = mysqli_query($conn, $sql2);
        $hackerrank = mysqli_query($conn, $sql3);
        $leetcode = mysqli_query($conn, $sql4);
        $nptel = mysqli_query($conn, $sql5);
        $professional = mysqli_query($conn, $sql6);
        $research = mysqli_query($conn, $sql7);

        $num = mysqli_num_rows($result);
    ?>
        <div>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <center>
                    <h2>Student Information</h2>
                </center>
                <table>
                    <tr>
                        <h3>Personal Details</h3>
                    </tr>
                    <tr>
                        <td><strong>Full Name : </strong><?php echo ($row["fullname"] != null ? $row["fullname"] : "NA"); ?></td>
                        <td><strong>Email : </strong><?php echo ($row["email"] != null ? $row["email"] : "NA"); ?></td>
                        <td><strong>Ph.number : </strong><?php echo ($row["contactnumber"] != null ? $row["contactnumber"] : "NA"); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Result HSC : </strong><?php echo ($row["result_hsc"] != null ? $row["result_hsc"] : "NA"); ?>%</td>
                        <td><strong>Merit Rank : </strong><?php echo ($row["meritrank"] != null ? $row["meritrank"] : "NA"); ?></td>
                        <td><strong>Medium : </strong><?php echo ($row["medium"] != null ? $row["medium"] : "NA"); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Admission Type : </strong><?php echo ($row["admissiontype"] != null ? $row["admissiontype"] : "NA"); ?></td>
                        <td><strong>Counsellor : </strong><?php echo ($row["counsellor"] != null ? $row["counsellor"] : "NA"); ?></td>
                        <td><strong>Current Semester : </strong><?php echo ($row["currentsemester"] != null ? $row["currentsemester"] : "-"); ?></td>
                    </tr>
                </table> <!-- Close table -->
                <table>
                    <tr>
                        <h3>Academic Details</h3>
                    </tr>
                    <tr>
                        <td colspan='20' style='color: red;'><b>Semester wise CGPA</b></td>
                    </tr>
                    <tr>
                        <?php
                        $i = 1;
                        $num = $row["currentsemester"];
                        while ($i < $num) {
                            echo "<td><strong>Sem $i :</strong> " . $row["sem$i"]  . "</td>";
                            if ($i % 4 == 0) {
                                echo "</tr><tr>";
                            }
                            $i++;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan='20' style='color: red;'><b>Year wise CGPA</b></td>
                    </tr>
                    <tr>
                        <?php
                        for ($i = 1; $i < $num / 2; $i++) {
                            echo "<td><strong>Year $i :</strong> " . $row["year$i"]  . "</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td><strong>Career Option</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Career Choice : </strong><?php echo ($row["interest"] != null ? $row["interest"] : "NA"); ?></td>
                    </tr>
                </table>
            <?php
            }
            ?>
        </div>
        <table>
            <tr>
                <h3>Technology Stand</h3>
            </tr>
            <tr>
                <?php
                while ($row1 = $techno_stand->fetch_assoc()) {
                ?>
                    <td><strong>Competative Programming :</strong><?php echo ($row1["cp"] != null ? $row1["cp"] : "NA"); ?></td>
                    <td><strong>Web Development :</strong><?php echo ($row1["web"] != null ? $row1["web"] : "NA"); ?></td>
                    <td><strong>Artificial Intelligence :</strong><?php echo ($row1["ai"] != null ? $row1["ai"] : "NA"); ?></td>
                    <td><strong>Android Programming :</strong><?php echo ($row1["android"] != null ? $row1["android"] : "NA"); ?></td>

            </tr>
            <tr>
                <td><strong>Other Field :</strong> <?php echo ($row1["otherfield"] != null ? $row1["otherfield"] : "NA"); ?></td>
                <td><strong>Score of Other Field :</strong> <?php echo ($row1["any_score"] != null ? $row1["any_score"] : "NA"); ?></td>
            </tr>
            <tr>
                <td><strong>Preferred Technology :</strong> <?php echo ($row1["prefer"] != null ? $row1["prefer"] : "NA"); ?></td>
            </tr>
        <?php
                }
        ?>
        </table>

        <table>
            <tr>
                <h3>Technical Details</h3>
            </tr>
            <tr>
                <td colspan='20'><strong>Codechef Details</strong></td>
            </tr>
            <?php
            while ($row1 = $codechef->fetch_assoc()) {
            ?>
                <tr>
                    <td><strong>Language :</strong> <?php echo ($row1["clanguages"] != null ? $row1["clanguages"] : "NA"); ?></td>
                    <td><strong>Rank :</strong> <?php echo ($row1["crank"] != null ? $row1["crank"] : "NA"); ?></td>
                    <td><strong>Points :</strong> <?php echo ($row1["cpoint"] != null ? $row1["cpoint"] : "NA"); ?></td>
                    <td><strong>Problem Solved :</strong> <?php echo ($row1["cnumber"] != null ? $row1["cnumber"] : "NA"); ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <table>
            <tr>
                <td colspan='20'><strong>Hackerrank Details</strong></td>
            </tr>
            <?php
            while ($row1 = $hackerrank->fetch_assoc()) {
            ?>
                <tr>
                    <td><strong>Language :</strong> <?php echo ($row1["hlanguages"] != null ? $row1["hlanguages"] : "NA"); ?></td>
                    <td><strong>Rank :</strong> <?php echo ($row1["hrank"] != null ? $row1["hrank"] : "NA"); ?></td>
                    <td><strong>Points :</strong> <?php echo ($row1["hpoint"] != null ? $row1["hpoint"] : "NA"); ?></td>
                    <td><strong>Problem Solved :</strong> <?php echo ($row1["hnumber"] != null ? $row1["hnumber"] : "NA"); ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <table>
            <tr>
                <td colspan='20'><strong>Leetcode Details</strong></td>
            </tr>
            <?php
            while ($row1 = $leetcode->fetch_assoc()) {
            ?>
                <tr>
                    <td><strong>Language :</strong> <?php echo ($row1["languages"] != null ? $row1["languages"] : "NA"); ?></td>
                    <td><strong>Rank :</strong> <?php echo ($row1["lrank"] != null ? $row1["lrank"] : "NA"); ?></td>
                    <td><strong>Points :</strong> <?php echo ($row1["lpoint"] != null ? $row1["lpoint"] : "NA"); ?></td>
                    <td><strong>Problem Solved :</strong> <?php echo ($row1["lnumber"] != null ? $row1["lnumber"] : "NA"); ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <table>
            <tr>
                <h3>Courses Details</h3>
            </tr>
            <tr>
                <td colspan='2'><strong>NPTEL</strong></td>
            </tr>
            <?php
            while ($row1 = $nptel->fetch_assoc()) {
            ?>
                <tr>
                    <td><strong>Course Title :</strong> <?php echo ($row1["nptelcourses"] != null ? $row1["nptelcourses"] : "NA"); ?></td>
                    <td><strong>Score :</strong> <?php echo ($row1["nscore"] != null ? $row1["nscore"] : "NA"); ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan='2'><strong>Professional Courses</strong></td>
            </tr>
            <?php
            while ($row2 = $professional->fetch_assoc()) {
            ?>
                <tr>
                    <td><strong>Course Title :</strong> <?php echo ($row2["course"] != null ? $row2["course"] : "NA"); ?></td>
                    <td><strong>Score :</strong> <?php echo ($row2["result"] != null ? $row2["result"] : "NA"); ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan='2'><strong>Project / Research paper</strong></td>
            </tr>
            <?php
            while ($row2 = $research->fetch_assoc()) {
            ?>
                <tr>
                    <td><strong>Title:</strong> <?php echo ($row2["project"] != null ? $row2["project"] : "NA"); ?></td>
                    <td><strong>Used technology :</strong> <?php echo ($row2["tech"] != null ? $row2["tech"] : "NA"); ?></td>
                </tr>
            <?php
            }
            ?>
        <?php
    }
        ?>
        </table>

</body>

</html>