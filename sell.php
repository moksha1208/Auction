<?php
session_start();
require "connection.php";
echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";



  echo "IN SELLLLLL";
  $_SESSION['pid'] = $_COOKIE['pid'];
  $pid = $_SESSION['pid'];
  echo $pid;
  $q = "select * from product_bidding where p_id like '{$pid}'";
  $r = $conn->query($q);
  if($r->num_rows == 1){
    $row = $r->fetch_assoc();
    $buyer_email = $row['bidder_email'];
    $seller_email = $row['seller_email'];
    $amount = $row['amount'];
  }



  $q1 = "update product set sold = 1 where p_id like '{$pid}'";
  $q2 = "delete from product_bidding where p_id like '{$pid}'";
  $q3 = "insert into product_bought (p_id, email, amount) values ('{$pid}', '{$buyer_email}', '{$amount}')";
  $q4 = "delete from product_selling where p_id likr '{$pid}'";
  $q5 = "insert into product_sold (p_id, email, amount) values ('{$pid}', '{$seller_email}', '{$amount}')";
  echo "r1";
  $r1 = $conn->query($q1);
  print_r($r1);
  if($r1 === TRUE) {
 echo "Insert Successful";
} else {
 echo "Error: " . $q1 . "<br>" . mysqli_error($conn);
}

echo "r2";
$r2 = $conn->query($q2);
print_r($r2);
if($r2 === TRUE) {
echo "Insert Successful";
} else {
echo "Error: " . $q2 . "<br>" . mysqli_error($conn);
}

echo "r3";
$r3 = $conn->query($q3);
print_r($r3);
if($r3 === TRUE) {
echo "Insert Successful";
} else {
echo "Error: " . $q3 . "<br>" . mysqli_error($conn);
}

echo "r4";
$r4 = $conn->query($q4);
print_r($r4);
if($r4 === TRUE) {
echo "Insert Successful";
} else {
echo "Error: " . $q4 . "<br>" . mysqli_error($conn);
}

echo "r5";
$r5 = $conn->query($q5);
print_r($r5);
if($r5 === TRUE) {
echo "Insert Successful";
} else {
echo "Error: " . $q5 . "<br>" . mysqli_error($conn);
}


?>
