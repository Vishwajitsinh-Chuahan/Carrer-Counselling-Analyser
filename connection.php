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
    echo "Connection failed".mysqli_connect_error();//it show what is error
}


?>
