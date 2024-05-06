<?php
session_start();
include('connection.php');

if (!(isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true) {
    header('Location:index.php');
    exit;
}
?>
<?php
include('connection.php');

// Retrieve form data
$course = $_POST['nptelcourses'];
$score = $_POST['nscore'];
$id = $_POST['id'];

// Assuming you have established a database connection

if(isset($course) && isset($score)  && isset($id)) {

    $sql = "INSERT INTO nptel (nptelcourses,nscore ,student_id) VALUES ('$course','$score','$id')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo "One or more POST variables are not set";
}
?>
