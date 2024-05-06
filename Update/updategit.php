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
    $sql = "SELECT * FROM github WHERE sr_no = '$sr_no'";
    $result = mysqli_query($conn, $sql);

    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }

    echo json_encode($response);
} 
if (isset($_POST['update'])) {
    $sr_no = $_POST['sr_no'];
    $repo = $_POST['repo'];
    $contro = $_POST['contro'];
    $stars = $_POST['stars'];
   

    // Update only if the fields are not empty
    $updateQuery = "";
    if (!empty($repo)) {
        $updateQuery .= "githubprojectrepo = '$repo', ";
    }
    if (!empty($contro)) {
        $updateQuery .= "contributions = '$contro', ";
    }
    if (!empty($stars)) {
        $updateQuery .= "githubstars = '$stars', ";
    }
    
    // Remove trailing comma and space
    $updateQuery = rtrim($updateQuery, ', ');

    if (!empty($updateQuery)) {
        $sql1 = "UPDATE github SET $updateQuery WHERE sr_no = '$sr_no'";
        $result1 = mysqli_query($conn, $sql1);

        if ($result1) {
            echo "1"; // Success
        } else {
            echo "0"; // Failure
        }
    } else {
        echo "0"; // No changes made
    }
}
?>
