<?php
session_start();
require "connection.php";
// echo "<h3> PHP List All Session Variables</h3>";
//     foreach ($_SESSION as $key=>$val)
//     echo $key." ".$val."<br/>";



$email = $_SESSION["email"];
$mysqlquery3 = "select * from user where email = '$email'";
$result = $conn->query($mysqlquery3);

if($result->num_rows === 1){
  $row = $result->fetch_assoc();
  $_SESSION["name"]=$row["name"];
  echo $_SESSION["name"];
  $_SESSION["phoneno"]=$row["phoneno"];
  echo $_SESSION["phoneno"];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="myStyle.css"></link>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="myScript.js">

</script>
    <title>Auction Site</title>
  </head>
  <body class="">

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
      <h1><b>Profile</b></h>
    </div>
    <hr />
<br /><br />
    <!-- <div class="">
<h2>Welcome
  <?php
echo $_SESSION["name"];
 ?>
</h2>
    </div>
<br/>
<div>
  <h3>Phone Number : <?php echo $_SESSION["phoneno"]; ?> </h3><br/>
  <h3>Email : <?php echo $_SESSION["email"]; ?></h3>
</div> -->

<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h2 class="card-title">Welcome
      <?php
    echo $_SESSION["name"];
     ?>
   </h2>
  </br>
  <h4 class="card-subtitle mb-2 text-muted"> Phone Number : <?php echo $_SESSION["phoneno"]; ?></h4>
  <h4 class="card-subtitle mb-2 text-muted">Email : <?php echo $_SESSION["email"]; ?></h4>

  </div>
</div>
</br>
</br>

<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title">Catalogue</h5>
    <div>To Buy: <form action="buy.php"><input type="submit" class="btn btn-primary"></form></div>

  </div>
</div>
</br></br>
<!-- <div><form action="buy.php"><input type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span>BUY</form></div> -->
<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title">Catalogue</h5>
    <div>To Sell Product <form action="sellitem.php" method="post"><input type="submit" class="btn btn-primary"></form></div>
  </div>
</div>
</br></br>
<!-- <div><form action="sellitem.php" method="post"><input type="submit" class="btn btn-primary">SELL</form></div> -->
<hr>
</br>
<h2>View User Data</h2>
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    User Details
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <div>
      <h3>Products Sold :
        <?php
        $pid_sold = array();
        $mysqlquery5 = "SELECT p_id FROM product_sold WHERE email like '{$email}'";
        $result1 = $conn->query($mysqlquery5);
        if($result1->num_rows > 0){
          while($row1 = $result1->fetch_assoc()){
            array_push($pid_sold,$row1['p_id']);
          }
        }
        print_r($pid_sold);
        echo $result1->num_rows;
        $_SESSION['pid_sold'] = $pid_sold;
        print_r($_SESSION['pid_sold']);
        ?>
      </h3>

      <h3>Products Bought :
        <?php
        $pid_bought = array();
        $mysqlquery6 = "SELECT p_id FROM product_bought WHERE email like '{$email}'";
        $result2 = $conn->query($mysqlquery6);
        if($result2->num_rows > 0){
          while($row2 = $result2->fetch_assoc()){
            array_push($pid_bought,$row2['p_id']);
          }
        }
        print_r($pid_bought);
        echo $result2->num_rows;
        $_SESSION['pid_bought'] = $pid_bought;
        ?>
      </h3>

      <h3>Currently Bidding On :
        <?php
        $pid_bidding = array();
        $mysqlquery7 = "SELECT p_id FROM product_bidding WHERE bidder_email like '{$email}'";
        $result3 = $conn->query($mysqlquery7);
        if($result3->num_rows > 0){
          while($row3 = $result3->fetch_assoc()){
            array_push($pid_bidding,$row3['p_id']);
          }
        }
        print_r($pid_bidding);
        echo $result3->num_rows;
        $_SESSION['pid_bidding'] = $pid_bidding;
        ?>
      </h3>

      <h3>Products Selling :
        <?php
        $pid_selling = array();
        $mysqlquery8 = "SELECT p_id FROM product WHERE seller like '{$email}'";
        $result4 = $conn->query($mysqlquery8);
        if($result4->num_rows > 0){
          while($row4 = $result4->fetch_assoc()){
            array_push($pid_selling,$row4['p_id']);
          }
        }
        print_r($pid_selling);
        echo $result4->num_rows;
        $_SESSION['pid_selling'] = $pid_selling;
        ?>
      </h3>

    </div>  </div>
</div>

<button class="btn btn-primary"onclick="window.location.href='https://auctionsite.000webhostapp.com/listview.php'">View Detailed Data</button>

</div>

  </body>
</html>
