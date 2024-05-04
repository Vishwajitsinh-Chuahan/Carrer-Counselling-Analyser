<?php
include('connection.php');

// Retrieve form data
$language = $_POST['clanguage'];
$rank = $_POST['crank'];
$point = $_POST['cpoint'];
$number = $_POST['cnumber'];
$id = $_POST['id'];

// Assuming you have established a database connection

if(isset($language) && isset($rank) && isset($point) && isset($number) && isset($id)) {

    $sql = "INSERT INTO codechef (clanguages, crank, cpoint, cnumber, student_id) VALUES ('$language','$rank','$point','$number','$id')";
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
