<?php
session_start();
if (!(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true)) {
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
        <th scope="col" width="250px">Result</th>
        <th scope="col" width="200px">Operations</th>
      </tr>
    </thead>';

    $sql='select * from professionalcourses where student_id="'.$_SESSION['account'].'"';
    $result1=mysqli_query($conn,$sql);
    $i=1;
    while($row = mysqli_fetch_assoc($result1)) {
        $course=$row['course'];
        $result=$row['result'];
        $sr_no=$row['sr_no'];

        $table.=' <tr>
        <td scope="row">'.$i.'</td>
        <td>'.$course.'</td>
        <td>'.$result.'</td>
    
        <td>
            <button type="button" class="btn btn-dark" onclick="updateProfessionalCourses('.$sr_no.')">Update</button>
            <button type="button" class="btn btn-danger" onclick="deleteProfessionalCourses('.$sr_no.')">Delete</button>
       </td>
      
       </tr>';
      
      $i++;
}
       $table.='</table>';
       echo $table;
}
?>

