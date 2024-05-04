<?php
include('connection.php');

// Retrieve form data
$language = $_POST['hlanguage'];
$rank = $_POST['hrank'];
$point = $_POST['hpoint'];
$number = $_POST['hnumber'];
$id = $_POST['id'];

// Assuming you have established a database connection

if(isset($language) && isset($rank) && isset($point) && isset($number) && isset($id)) {

    $sql = "INSERT INTO hackerrank (hlanguages, hrank, hpoint, hnumber, student_id) VALUES ('$language','$rank','$point','$number','$id')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Data inserted successfully";
    } else {
        echo "Error in inserting data";
    }
} else {
    echo "One or more POST variables are not set";
}
?>
