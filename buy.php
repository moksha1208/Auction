<?php
session_start();
require "connection.php";
// if (isset($_SESSION['email']))
//     echo ' all html code ';
// echo "<h3> PHP List All Session Variables</h3>";
//     foreach ($_SESSION as $key=>$val)
//     echo $key." ".$val."<br/>";
// require_once('test.php');


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="myStyle.css"></link>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript" src="myScript.js">
<link rel="stylesheet" href="myStyle.css"></link>
</script>
    <title>Auction Site</title>
  </head>

  <body class="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.html">Auction Site</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="index.html">Home </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="about.html">About Us <span class="sr-only">(current)</span> </a>
          </li>

          <li class="nav-item">
            <a class="nav-link logout" href="about.html">Log Out <span class="sr-only">(current)</span> </a>
          </li>

        </ul>

        <!-- <li class="nav-item">
          <a class="nav-link logout" href="about.html">Log Out <span class="sr-only">(current)</span> </a>
        </li> -->

      </div>
    </nav>
<br />

<div class="container">
    <div class="">
      <h1><b>Catalogue</b></h>
    </div>
    <ul class="list-unstyled">

      <?php
      $mysqlquery5 = "select * from `product` where sold=0";
      $result1 = $conn->query($mysqlquery5);
      $pid_arrayy = Array();

if (!$result1) {
    trigger_error('Invalid query: ' . $conn->error);
}
      if($result1->num_rows > 0) {
          while($row1 = $result1->fetch_assoc()) {
            array_push($pid_arrayy,$row1['p_id'])
          ?>
          <li class="media">
            <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['image']).'" class="zoom" width="200" height="100"/>'
            ?>
          <div class="media-body">
          <h2 class="mt-0 mb-1">
            <div class="tdd">
            <?php
            print($row1["p_id"]);
            ?>
          </div>

          <!-- <a href="https://www.google.com"> -->

            <?php
            print($row1["p_name"]);
            ?>
          </h2>
          <!-- </a> -->


            <?php
            print($row1["base_amount"]);
            ?>

          </div>
</li>
</br>
<hr></br>
      <?php
        }
      }else {
        print 'null';
      }
      ?>
    </ul>
    <?php
    print_r($pid_arrayy);
    ?>
</div>




<script>
var tds = document.querySelectorAll(".tdd")
for(var td of tds){

  td.addEventListener("click",function Myfunction(td){
       document.cookie = "pid=" + td.target.innerText
       console.log(document.cookie)
       window.location = "https://auctionsite.000webhostapp.com/product.php"
  })
}
</script>
    </body>
</html>
