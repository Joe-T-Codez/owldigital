<?php
//Creates DB connection//
$conn=mysqli_connect("localhost","root","","acme");
/////////shows error if there is problem connecting to the database///
if(mysqli_connect_errno()){
  echo'Failed to connect to MySQL'.mysqli_connect_errno();
}
?>
