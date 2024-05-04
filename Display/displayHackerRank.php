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

if(isset($_POST['displaySend'])) {
    $table='<table class="table">
    <thead class="thead" style="background-color: lightgrey;">
      <tr>
        <th scope="col">Sr.No</th>
        <th scope="col">Language</th>
        <th scope="col">Rank</th>
        <th scope="col">Points</th>
        <th scope="col">No. of Problems</th>
      </tr>
    </thead>';

    $sql='select * from hackerrank where student_id="'.$_SESSION['account'].'"';
    $result=mysqli_query($conn,$sql);
    $i=1;
    while($row = mysqli_fetch_assoc($result)) {
        $language=$row['hlanguages'];
        $rank=$row['hrank'];
        $point=$row['hpoint'];
        $number=$row['hnumber'];

        $table.=' <tr>
        <td scope="row">'.$i.'</td>
        <td>'.$language.'</td>
        <td>'.$rank.'</td>
        <td>'.$point.'</td>
        <td>'.$number.'</td>
      </tr>';
      
      $i++;
}
       $table.='</table>';
       echo $table;
}
?>