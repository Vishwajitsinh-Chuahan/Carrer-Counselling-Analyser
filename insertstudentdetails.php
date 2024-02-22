<?php
include('connection.php');
if(isset($_POST['submit']))
{
  $full_name     =$_POST['fullname'];
  $student_id    =$_POST['idnumber'];
  $contact       =$_POST['contactnumber'];
  $email         =$_POST['email'];
  $hsc           =$_POST['result_hsc'];
  $medium        =$_POST['medium'];
  $meritrank     =$_POST['meritrank'];
  $admission     =$_POST['admissiontype'];
  $currentsem    =$_POST['currentsemester'];
  $sem1          =$_POST['sem1'];
  $sem2          =$_POST['sem2'];
  $sem3          =$_POST['sem3'];
  $sem4          =$_POST['sem4'];
  $sem5          =$_POST['sem5'];
  $sem6          =$_POST['sem6'];
  $sem7          =$_POST['sem7'];
  $sem8          =$_POST['sem8'];
  $year1          =$_POST['year1'];
  $year2          =$_POST['year2'];
  $year3          =$_POST['year3'];
  $year4          =$_POST['year4'];
  $interest        =$_POST['interest'];
  
  $cp              =$_POST['cp'];
  $web               =$_POST['web'];
  $ai               =$_POST['ai'];
  $android           =$_POST['android'];
  $otherfield        =$_POST['otherfield'];
  $any_score        =$_POST['any_score'];
  $prefer          =$_POST['prefer'];

  $repo=$_POST['githubprojectrepo'];
  $contributions=$_POST['contributions'];
  $stars=$_POST['githubstars'];

  $linkedin_link=$_POST['link'];

      
    $query1="INSERT INTO personalinformation VALUES('$full_name','$student_id','$contact','$email','$hsc','$medium','$meritrank','$admission','$currentsem','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$sem8','$year1','$year2','$year3','$year4','$interest' )";
    $data=mysqli_query($conn,$query1);

    $query2 = "INSERT INTO technologystand (cp,web,ai,android,otherfield,any_score,prefer,idnumber) VALUES ('$cp','$web','$ai','$android','$otherfield','$any_score','$prefer','$student_id')";
    $data=mysqli_query($conn,$query2);
  
  foreach($_POST['hlanguages'] as $key => $value)
  {
      $h_languages = mysqli_real_escape_string($conn, $value);
      $h_rank = mysqli_real_escape_string($conn,$_POST['hrank'][$key]);
      $h_points = mysqli_real_escape_string($conn, $_POST['hpoint'][$key]);
      $h_number = mysqli_real_escape_string($conn, $_POST['hnumber'][$key]);

      $hquery = "INSERT INTO hackerrank (hlanguages,hrank,hpoint, hnumber,idnumber) VALUES ('$h_languages', '$h_rank', '$h_points', '$h_number','$student_id')";
      $query_run = mysqli_query($conn, $hquery);
  }

  foreach($_POST['clanguages'] as $key => $value)
  {
      $c_languages = mysqli_real_escape_string($conn, $value);
      $c_rank = mysqli_real_escape_string($conn, $_POST['crank'][$key]);
      $c_points = mysqli_real_escape_string($conn, $_POST['cpoint'][$key]);
      $c_number = mysqli_real_escape_string($conn, $_POST['cnumber'][$key]);

      $cquery = "INSERT INTO codechef (clanguages,crank,cpoint, cnumber,idnumber) VALUES ('$c_languages', '$c_rank', '$c_points', '$c_number','$student_id')";
      $query_run = mysqli_query($conn, $cquery);
  }
 
  foreach($_POST['languages'] as $key => $value)
  {
      $l_languages = mysqli_real_escape_string($conn, $value);
      $l_rank = mysqli_real_escape_string($conn, $_POST['lrank'][$key]);
      $l_points = mysqli_real_escape_string($conn,$_POST['lpoint'][$key]);
      $l_number = mysqli_real_escape_string($conn,$_POST['lnumber'][$key]);

      $lquery = "INSERT INTO leetcode (languages,lrank,lpoint, lnumber,idnumber)VALUES ('$l_languages', '$l_rank', '$l_points', '$l_number','$student_id')";
      $query_run = mysqli_query($conn, $lquery);
  }


  foreach($_POST['nptelcourses'] as $key => $value)
  {
      $nptel_courses = mysqli_real_escape_string($conn, $value);
      $nptel_score = mysqli_real_escape_string($conn,$_POST['nscore'][$key]);

      $nptelquery = "INSERT INTO nptel (nptelcourses,nscore,idnumber) VALUES ('$nptel_courses', '$nptel_score','$student_id')";
      $query_run = mysqli_query($conn, $nptelquery);
  }

  foreach($_POST['course'] as $key => $value)
  {
      $professional_courses = mysqli_real_escape_string($conn, $value);
      $p_result = mysqli_real_escape_string($conn,$_POST['result'][$key]);

      $coursequery = "INSERT INTO professionalcourses (course,result,idnumber) VALUES ('$professional_courses', '$p_result','$student_id')";
      $query_run = mysqli_query($conn, $coursequery);
  }

  foreach($_POST['project'] as $key => $value)
  {
      $project_name = mysqli_real_escape_string($conn, $value);
      $tech_name = mysqli_real_escape_string($conn,$_POST['tech'][$key]);

      $projectquery = "INSERT INTO research (project,tech,idnumber) VALUES ('$project_name', '$tech_name','$student_id')";
      $query_run = mysqli_query($conn, $projectquery);
  }

    $githubquery="INSERT INTO github (githubprojectrepo,contributions,githubstars,link,idnumber) VALUES ('$repo','$contributions','$stars','$linkedin_link','$student_id')";
    $query_run = mysqli_query($conn,$githubquery);

  if($query_run==true&&$data==true)
  {
    echo "<script>alert('ALL info successfully submitted.');</script>";
  }else{
    echo "<script>alert('ALL info not submitted.');</script>";
  }
}
?>