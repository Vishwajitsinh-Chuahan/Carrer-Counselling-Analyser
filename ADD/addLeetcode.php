<?php
include('connection.php');

// Retrieve form data
$language = $_POST['language'];
$rank = $_POST['lrank'];
$point = $_POST['lpoint'];
$number = $_POST['lnumber'];
$id = $_POST['id'];

// Assuming you have established a database connection

if(isset($language) && isset($rank) && isset($point) && isset($number) && isset($id)) {

    $sql = "INSERT INTO leetcode (languages, lrank, lpoint, lnumber, student_id) VALUES ('$language','$rank','$point','$number','$id')";
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
