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
        <th scope="col" width="200px">Sr.No</th>
        <th scope="col" width="350px">Course Name</th>
        <th scope="col" width="250px">Score</th>
        <th scope="col" width="200px">Operations</th>
      </tr>
    </thead>';

    $sql='select * from nptel where student_id="'.$_SESSION['account'].'"';
    $result=mysqli_query($conn,$sql);
    $i=1;
    while($row = mysqli_fetch_assoc($result)) {
        $nptelcourses=$row['nptelcourses'];
        $score=$row['nscore'];
        $sr_no=$row['sr_no'];

        $table.=' <tr>
        <td scope="row">'.$i.'</td>
        <td>'.$nptelcourses.'</td>
        <td>'.$score.'</td>
    
        <td>
            <button type="button" class="btn btn-dark" onclick="updateNptel('.$sr_no.')">Update</button>
            <button type="button" class="btn btn-danger" onclick="deleteNptel('.$sr_no.')">Delete</button>
       </td>
      
       </tr>';
      
      $i++;
}
       $table.='</table>';
       echo $table;
}
?>
