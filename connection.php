<?php

$db_name = "id11048489_auction";
$mysql_username = "id11048489_ip123";
$mysql_password="ip123";
$host_name = "localhost";
$conn =mysqli_connect($host_name,$mysql_username,$mysql_password,$db_name);
if(!$conn){
  die("Connection Failed : " . mysqli_connect_error());
}
// echo "Connection successful";

 ?>
