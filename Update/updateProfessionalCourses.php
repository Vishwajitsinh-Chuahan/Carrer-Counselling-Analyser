<?php
session_start();
include('connection.php');

if (!(isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true) {
    header('Location:index.php');
    exit;
}

if (isset($_POST['sr_no'])) {
    $sr_no = $_POST['sr_no'];

    // Fetch current data for the selected record
    $sql = "SELECT * FROM professionalcourses WHERE sr_no = '$sr_no'";
    $res = mysqli_query($conn, $sql);

    $response = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $response = $row;
    }

    echo json_encode($response);
} 
if (isset($_POST['update'])) {
    $sr_no = $_POST['sr_no'];
    $course = $_POST['course'];
    $result = $_POST['result'];
   

    // Update only if the fields are not empty
    $updateQuery = "";
    if (!empty($course)) {
        $updateQuery .= "course = '$course', ";
    }
    if (!empty($result)) {
        $updateQuery .= "result = '$result', ";
    }
    
    // Remove trailing comma and space
    $updateQuery = rtrim($updateQuery, ', ');

    if (!empty($updateQuery)) {
        $sql1 = "UPDATE professionalcourses SET $updateQuery WHERE sr_no = '$sr_no'";
        $result2 = mysqli_query($conn, $sql1);

        if ($result2) {
            echo "1"; // Success
        } else {
            echo "0"; // Failure
        }
    } else {
        echo "0"; // No changes made
    }
}
?>
