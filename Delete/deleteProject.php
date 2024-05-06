<?php
session_start();
if (!(isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true) {
    header('Location:index.php');
    exit; // Added exit to stop further execution
} else {
    include('connection.php');
    // $id = $_GET['id'];
}
?>
<?php
include('connection.php');

if(isset($_POST['deleteSend'])) {
    $sr_no = $_POST['deleteSend'];

    $sql = "DELETE FROM research WHERE sr_no =$sr_no";
    $result=mysqli_query($conn,$sql);

}    
?>