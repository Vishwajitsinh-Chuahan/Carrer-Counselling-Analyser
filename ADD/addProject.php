<?php
session_start();
include('connection.php');

if (!(isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true) {
    header('Location:index.php');
    exit;
}
else{
include('connection.php');

// Retrieve form data
$project = $_POST['project'];
$tech = $_POST['tech'];
$id = $_POST['id'];

// Assuming you have established a database connection

if(isset($project) && isset($tech)  && isset($id)) {

    $sql = "INSERT INTO research (project,tech ,student_id) VALUES ('$project','$tech','$id')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo "One or more POST variables are not set";
}
}
?>
