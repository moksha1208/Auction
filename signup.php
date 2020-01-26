<?php

require "connection.php";

$name = $_POST["sname"];
$email = $_POST["semail"];
$pno = $_POST["spno"];
$pass = $_POST["spass"];
$rpass = $_POST["rpass"];

$mysqlquery = "insert into user(name , email , phoneno , password ) values ('{$name}','{$email}','{$pno}','{$pass}')";

if($conn->query($mysqlquery) === TRUE){
  echo "Insert successful";
  $_SESSION["email"] = $email;
  $_SESSION["password"] = $pass;
  echo "Session variables are set.";
  echo "Email " . $_SESSION["email"] . ".<br>";
  echo "Password " . $_SESSION["password"] . ".";
  include 'testprofile.php';
}
else {
  echo "Error : ". $mysqlquery . "<br>" . $conn->error;
  echo '<script language="javascript">';
  echo 'alert("User already exists")';
  echo '</script>';
  session_unset();
  echo "Session variables are unset.already user";
  echo "Email " . $_SESSION["email"] . ".<br>";
  echo "Password " . $_SESSION["password"] . ".";
  include "signup.html";
}
$conn->close();

 ?>
