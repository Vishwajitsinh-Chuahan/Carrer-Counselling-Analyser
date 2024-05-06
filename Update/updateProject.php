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
    $sql = "SELECT * FROM research WHERE sr_no = '$sr_no'";
    $result = mysqli_query($conn, $sql);

    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }

    echo json_encode($response);
} 
if (isset($_POST['update'])) {
    $sr_no = $_POST['sr_no'];
    $project = $_POST['project'];
    $tech = $_POST['tech'];
   

    // Update only if the fields are not empty
    $updateQuery = "";
    if (!empty($project)) {
        $updateQuery .= "project = '$project', ";
    }
    if (!empty($tech)) {
        $updateQuery .= "tech = '$tech', ";
    }
    
    // Remove trailing comma and space
    $updateQuery = rtrim($updateQuery, ', ');

    if (!empty($updateQuery)) {
        $sql1 = "UPDATE research SET $updateQuery WHERE sr_no = '$sr_no'";
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
