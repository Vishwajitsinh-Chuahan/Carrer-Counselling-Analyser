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
        <th scope="col" width="250px">No of Reposetries</th>
        <th scope="col" width="250px">No of Contributions</th>
        <th scope="col" width="250px">No of GithubStar</th>
        <th scope="col" width="250px">Operation</th>
      </tr>
    </thead>';

    $sql='select * from github where student_id="'.$_SESSION['account'].'"';
    $result=mysqli_query($conn,$sql);
    $i=1;
    while($row = mysqli_fetch_assoc($result)) {
        $repo=$row['githubprojectrepo'];
        $contro=$row['contributions'];
        $stars=$row['githubstars'];
        $sr_no=$row['sr_no'];

        $table.=' <tr>
        <td>'.$repo.'</td>
        <td>'.$contro.'</td>
        <td>'.$stars.'</td>
    
        <td>
            <button type="button" class="btn btn-dark" onclick="updategit('.$sr_no.')">Update</button>
       </td>
      
       </tr>';
      
      $i++;
}
       $table.='</table>';
       echo $table;
}
?>
