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
$course = $_POST['coursename'];
$result = $_POST['result'];
$id = $_POST['id'];

// Assuming you have established a database connection

if(isset($course) && isset($result)  && isset($id)) {

    $sql = "INSERT INTO professionalcourses (course,result ,student_id) VALUES ('$course','$result','$id')";
    $result1 = mysqli_query($conn, $sql);

    if($result1) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo "One or more POST variables are not set";
}
}
?>
