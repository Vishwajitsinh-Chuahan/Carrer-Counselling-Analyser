<?php
session_start();
if (!(isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true) {
    header('Location:login.php');
} else {
    include('connection.php');
    $id = $_GET['id'];
    //    echo "id is".$id;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-6o7k3k9v2NJGB8b1K4d2uplZHZ/w7kO2e2H3UUyEXNXc3sBexQ4j2LYo9z6CfvmY8mjPFC9VNNpgGzB22yOIHw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Career Counselling Form - Career Counselling Analyzer</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: antiquewhite;
        }

        .navbar {
            /* background: linear-gradient(to bottom right, #5f9ea0, #49767b); */
            background: linear-gradient(to bottom right, #5f9ea0, #30757a, #5f9ea0);
            /* Position the navbar at the top of the page */
        }

        .table {
            width: 100%; /* Adjust the width as needed */
        }

        #nav {
            margin-left: 20px;
            background-color: #ccc;
            color: black;
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

        #copdechef-table, #hackerrank-table, #leetcode-table {
            border-collapse: collapse;
        }

        #copdechef-table th, #hackerrank-table th, #leetcode-table th, #leetcode-table td,
        #copdechef-table td, #hackerrank-table td {
            border: 2px solid #ddd; /* Set border color and style */
            padding: 5px; /* Decrease padding for better spacing */
            /* Center align content  */
        }

        #copdechef-table th, #hackerrank-table th, #leetcode-table th {
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

                <div class="card-header"
                     style="background: linear-gradient(to bottom right, #5f9ea0,#30757a,#49767b); color:white;">
                    <h4 class="text-center">Technical Profile</h4>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="main-form mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="" style="font-weight: bold;">Nptel Courses:</label>
                                        <input type="text" name="nptelcourses[]" class="form-control"
                                               placeholder="Enter course name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for="" style="font-weight: bold;">Score:</label>
                                        <input type="number" name="nscore[]" class="form-control"
                                               placeholder="Enter score">
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <br>
                                        <a href="javascript:void(0)"
                                           class="add-nptel-form float-end btn btn-primary">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="paste-new-forms-nptel"></div>

                    <div class="row">

                        <div class="main-form mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="" style="font-weight: bold;">Professional Courses:</label>
                                        <input type="text" name="course[]" class="form-control"
                                               placeholder="Enter course name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for="" style="font-weight: bold;">Result:</label>
                                        <input type="number" name="result[]" class="form-control"
                                               placeholder="Enter result">
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <br>
                                        <a href="javascript:void(0)"
                                           class="add-professional-form float-end btn btn-primary">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="paste-new-forms-professional"></div>


                    <div class="row">
                        <br>

                        <div class="main-form mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="" style="font-weight: bold;">Project / Research paper:</label>
                                        <input type="text" name="project[]" class="form-control"
                                               placeholder="Enter project/research paper name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for="" style="font-weight: bold;">Used Technology:</label>
                                        <input type="text" name="tech[]" class="form-control"
                                               placeholder="Enter used technology name">
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <br>
                                        <a href="javascript:void(0)"
                                           class="add-research-form float-end btn btn-primary">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="paste-new-forms-research"></div>

                    </div>
                    <div class="row text-center mt-3">
                        <div class="col-md-4 mx-auto">
                            <div class="form-group mb-2">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {


        $(document).on('click', '.add-nptel-form', function () {
            addNptelForm();
        });

        $(document).on('click', '.add-professional-form', function () {
            addProfessionalForm();
        });

        $(document).on('click', '.add-research-form', function () {
            addProjectForm();
        });

        function addNptelForm() {
            $('.paste-new-forms-nptel').append('<div class="row">\
                <div class="col-md-4 ">\
                <div class="form-group mb-2">\
                        <input type="text" name="nptelcourses[]" class="form-control" required placeholder="Enter course name">\
                        </div>\
                        </div>\
                        <div class="col-md-2">\
                        <div class="form-group mb-2">\
                        <input type="number" name="nscore[]" class="form-control" placeholder="Enter score">\
                        </div>\
                        </div>\
                        <div class="col-md-2">\
                        <div class="form-group mb-2">\
                        <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                        </div>\
                </div>\
            </div>');
        }

        function addProfessionalForm() {
            $('.paste-new-forms-professional').append('<div class="row">\
                <div class="col-md-4 ">\
                    <div class="form-group mb-2">\
                        <input type="text" name="course[]" class="form-control" required placeholder="Enter course name">\
                        </div>\
                        </div>\
                        <div class="col-md-2">\
                        <div class="form-group mb-2">\
                        <input type="number" name="result[]" class="form-control" placeholder="Enter result">\
                        </div>\
                        </div>\
                        <div class="col-md-2">\
                        <div class="form-group mb-2">\
                        <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                        </div>\
                        </div>\
                        </div>');
        }

        function addProjectForm() {
            $('.paste-new-forms-research').append('<div class="row">\
                <div class="col-md-4 ">\
                <div class="form-group mb-2">\
                <input type="text" name="project[]" class="form-control" required placeholder="Enter project/research paper name">\
                </div>\
                </div>\
                <div class="col-md-2">\
                <div class="form-group mb-2">\
                <input type="text" name="tech[]" class="form-control" placeholder="Enter used technology name">\
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


<?php
include('connection.php');

if (isset($_POST['submit'])) {
    // Sanitize and validate inputs
    $student_id = isset($_SESSION["account"]) ? mysqli_real_escape_string($conn, $_SESSION["account"]) : '';

    $existingCourses = array(); // Array to store existing courses

    // Fetch existing courses from each table and store them in the $existingCourses array
    $existingCourseQuery = "SELECT nptelcourses FROM nptel WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $existingCourseQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        $existingCourses[] = $row['nptelcourses'];
    }

    $existingCourseQuery = "SELECT course FROM professionalcourses WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $existingCourseQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        $existingCourses[] = $row['course'];
    }

    $existingCourseQuery = "SELECT project FROM research WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $existingCourseQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        $existingCourses[] = $row['project'];
    }

    // Check if any of the posted courses already exist
    foreach ($_POST['nptelcourses'] as $key => $value) {
        if (in_array($value, $existingCourses)) {
            echo "<script>alert('Course $value already exists in NPTEL.'); window.location.href = 'fdisplay.php';</script>";
            exit;
        }
    }

    foreach ($_POST['course'] as $key => $value) {
        if (in_array($value, $existingCourses)) {
            echo "<script>alert('Course $value already exists in Professional Courses.'); window.location.href = 'fdisplay.php';</script>";
            exit;
        }
    }

    foreach ($_POST['project'] as $key => $value) {
        if (in_array($value, $existingCourses)) {
            echo "<script>alert('Project $value already exists in Research.'); window.location.href = 'fdisplay.php';</script>";
            exit;
        }
    }
    if (!empty($_POST['nptelcourses'])) {
        foreach ($_POST['nptelcourses'] as $key => $value) {
            $course = mysqli_real_escape_string($conn, $value);
            $score = isset($_POST['nscore'][$key]) && $_POST['nscore'][$key] !== '0' && $_POST['nscore'][$key] !== 'NA' && $_POST['nscore'][$key] !== '' ? mysqli_real_escape_string($conn, $_POST['nscore'][$key]) : '';

            // Insert NPTEL data if score is not '0', 'NA', or blank
            if (!empty($score)) {
                $query = "INSERT INTO nptel (nptelcourses, nscore, student_id) VALUES ('$course', '$score', '$student_id')";
                mysqli_query($conn, $query);
            }
        }
    }

    // Check if additional data for professional courses and research projects is provided
    if (!empty($_POST['course'])) {
        foreach ($_POST['course'] as $key => $value) {
            $course = mysqli_real_escape_string($conn, $value);
            $result = isset($_POST['result'][$key]) && $_POST['result'][$key] !== '0' && $_POST['result'][$key] !== 'NA' && $_POST['result'][$key] !== '' ? mysqli_real_escape_string($conn, $_POST['result'][$key]) : '';

            // Insert professional courses data if result is not '0', 'NA', or blank
            if (!empty($result)) {
                $query = "INSERT INTO professionalcourses (course, result, student_id) VALUES ('$course', '$result', '$student_id')";
                mysqli_query($conn, $query);
            }
        }
    }

    if (!empty($_POST['project'])) {
        foreach ($_POST['project'] as $key => $value) {
            $project = mysqli_real_escape_string($conn, $value);
            $tech = isset($_POST['tech'][$key]) && $_POST['tech'][$key] !== '0' && $_POST['tech'][$key] !== 'NA' && $_POST['tech'][$key] !== '' ? mysqli_real_escape_string($conn, $_POST['tech'][$key]) : '';

            // Insert research projects data if tech is not '0', 'NA', or blank
            if (!empty($tech)) {
                $query = "INSERT INTO research (project, tech, student_id) VALUES ('$project', '$tech', '$student_id')";
                mysqli_query($conn, $query);
            }
        }
    }

    // Check if the insertion was successful
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('All information successfully submitted.'); window.location.href = 'fdisplay.php';</script>";
    } else {
        echo "<script>alert('Failed to submit information.'); window.location.href = 'fdisplay.php';</script>";
    }
}
?>
