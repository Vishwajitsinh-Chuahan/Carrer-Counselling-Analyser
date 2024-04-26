<?php
$servername="localhost";
$username="root";
$password="";
$dbname="sgp2";

$conn=mysqli_connect($servername,$username,$password,$dbname);//sql query

if($conn)
{
    //echo "Connection established"; 
    
}else{
    echo "<script>alter('connection is failed ');</script>";//it show what is error
}


?>
