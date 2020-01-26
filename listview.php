<?php
session_start();
require "connection.php";
echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";

print_r($_SESSION['pid_sold']);
print_r($_SESSION['pid_bought']);
print_r($_SESSION['pid_bidding']);
print_r($_SESSION['pid_selling']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="myStyle.css"></link>

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="myScript.js">

</script>
    <title>Auction Site</title>
  </head>
  <body>

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
            <a class="nav-link" href="login.html">Login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="signup.html">SignUp</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="about.html">About Us <span class="sr-only">(current)</span> </a>
          </li>

        </ul>
      </div>
    </nav>
<br />
    <div class="container">
      <h1><b>List</b></h>
    </div>
    <hr />
<br /><br />

<script src="https://code.jquery.com/jquery-2.1.1.js"></script>
<script>
// $(".input").click(function(){
//   alert("clicked");
//   alert($(this).parent());
//   alert($(this).parent().parent().siblings(".tdr").text());
// })

// $(".input").on('click', function(e){
//   alert("asd");
  // $(this).parent().parent().addClass('selected').siblings().removeClass('selected');
  // alert($("#table tr.selected td:first").html());
// })

</script>

<!-- <script>
var tds = document.querySelectorAll(".tdr")
for(var td of tds){ i

  td.addEventListener("click",function Myfunction(td){
    console.log(td);
       document.cookie = "pid=" + td.target.innerText
       console.log(document.cookie)
       window.location = "https://auctionsite.000webhostapp.com/product.php"
  })
}
</script> -->

<?php
// function sell(){
//   echo "IN SELLLLLL";
//   $q = "select * from product_bidding where p_id like '{$pid}'";
//   $r = $conn->query($q);
//   if($r->num_rows == 1){
//     $row = $r->fetch_assoc();
//     $buyer_email = $row['bidder_email'];
//     $seller_email = $row['seller_email'];
//     $amount = $row['amount'];
//   }
//
//
//
//   $q1 = "update product set sold = 1 where p_id like '{$pid}'";
//   $q2 = "delete from product_bidding where p_id like '{$pid}'";
//   $q3 = "insert into product_bought (p_id, email, amount) values ('{$pid}', '{$buyer_email}', '{$amount}')";
//   $q4 = "delete from product_selling where p_id likr '{$pid}'";
//   $q5 = "insert into product_sold (p_id, email, amount) values ('{$pid}', {'$seller_email'}, '{$amount}')";
//   $r1 = $conn->query($q1);
//   $r2 = $conn->query($q2);
//   $r3 = $conn->query($q3);
//   $r4 = $conn->query($q4);
//   $r5 = $conn->query($q5);
// }
?>

</br>
<h1>Selling Table :- </h1>
</br>
<table border="1" id="table">
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Image</th>
    <th>Sell</th>
  </tr>
  <?php
  $pid_selling = $_SESSION['pid_selling'];
  foreach ($pid_selling as $value) {
    $pid = $value;

  $mysqlquery4 = "select * from `product` where p_id = '{$pid}'";
  $result = $conn->query($mysqlquery4);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
      <tr >
      <td class="sellId">
        <?php
        print($row["p_id"]);
        ?>
      </td>
      <td>
        <?php
        print($row["p_name"]);
        ?>
       </td>
      <td>
        <?php
        print($row["base_amount"]);
        ?>
      </td>
      <td>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
        ?>
      </td>
      <td>
        <button class="input" >SELL</button>
        <!-- <form action="" method="get">
          <input class="input" type="submit" name="sell" value="SELL"/>
        </form> -->

      </td>

  </tr>
  <?php
    }
  }else {
    print 'null';
  }
}
  ?>
</table>

<script>
var sold = document.querySelectorAll(".input")
for(var s of sold){

  s.addEventListener("click",function Myfunction(s){
    console.log("in onclick function")
    var target = $( event.target );
    //console.log(target.parent());
    //console.log(target.parent().parent());
    var sss = target.parent().parent().toArray();
    //console.log("JI "+sss[0].childNodes);
    var c = sss[0].childNodes;
    console.log(c[1].innerText);
    //console.log(sss);
    document.cookie = "pid=" + c[1].innerText
    console.log(document.cookie)
    window.location = "https://auctionsite.000webhostapp.com/sell.php"

    //
    // $_SESSION['pid'] = $_COOKIE['pid'];
    // $pid = $_SESSION['pid'];
    // echo "IN SELLLLLL";
    // $q = "select * from product_bidding where p_id like '{$pid}'";
    // $r = $conn->query($q);
    // if($r->num_rows == 1){
    //   $row = $r->fetch_assoc();
    //   $buyer_email = $row['bidder_email'];
    //   $seller_email = $row['seller_email'];
    //   $amount = $row['amount'];
    // }
    //
    //
    //
    // $q1 = "update product set sold = 1 where p_id like '{$pid}'";
    // $q2 = "delete from product_bidding where p_id like '{$pid}'";
    // $q3 = "insert into product_bought (p_id, email, amount) values ('{$pid}', '{$buyer_email}', '{$amount}')";
    // $q4 = "delete from product_selling where p_id likr '{$pid}'";
    // $q5 = "insert into product_sold (p_id, email, amount) values ('{$pid}', {'$seller_email'}, '{$amount}')";
    // $r1 = $conn->query($q1);
    // $r2 = $conn->query($q2);
    // $r3 = $conn->query($q3);
    // $r4 = $conn->query($q4);
    // $r5 = $conn->query($q5);
    //
    //SO basically c[1].innerText is your pid variable

      // console.log($('tr').eq(s));
      // var temp = $('tr').eq(s);
      // console.log(temp);
      // // console.log(temp.$('td').eq(0).text());
      // console.log($('td').eq(0));
      // console.log(s);
      // console.log($('td'));
       // document.cookie = "pid=" + td.target.innerText
       // console.log(document.cookie)
       // window.location = "https://auctionsite.000webhostapp.com/product.php"
  })
}
</script>

</br>
<h1>Products being bid on :- </h1>
</br>

<table border="1">
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Image</th>
  </tr>
  <?php
  $pid_bidding = $_SESSION['pid_bidding'];
  foreach ($pid_bidding as $value) {
    $pid = $value;

  $mysqlquery4 = "select * from `product` where p_id = '{$pid}'";
  $result = $conn->query($mysqlquery4);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
      <tr>
      <td class="tdd">
        <?php
        print($row["p_id"]);
        ?>
      </td>
      <td>
        <?php
        print($row["p_name"]);
        ?>
       </td>
      <td>
        <?php
        print($row["base_amount"]);
        ?>
      </td>
      <td>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
        ?>
      </td>

  </tr>
  <?php
    }
  }else {
    print 'null';
  }
}
  ?>
</table>

</br>
<h1>Products Sold :- </h1>
</br>

<table border="1">
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Image</th>
  </tr>
  <?php
  $pid_sold = $_SESSION['pid_sold'];
  foreach ($pid_sold as $value) {
    $pid = $value;

  $mysqlquery4 = "select * from `product` where p_id = '{$pid}'";
  $result = $conn->query($mysqlquery4);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
      <tr>
      <td class="tdd">
        <?php
        print($row["p_id"]);
        ?>
      </td>
      <td>
        <?php
        print($row["p_name"]);
        ?>
       </td>
      <td>
        <?php
        print($row["base_amount"]);
        ?>
      </td>
      <td>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
        ?>
      </td>

  </tr>
  <?php
    }
  }else {
    print 'null';
  }
}
  ?>
</table>

</br>
<h1>Products Bought :- </h1>
</br>

<table border="1">
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Image</th>
  </tr>
  <?php
  $pid_bought = $_SESSION['pid_bought'];
  foreach ($pid_bought as $value) {
    $pid = $value;

  $mysqlquery4 = "select * from `product` where p_id = '{$pid}'";
  $result = $conn->query($mysqlquery4);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
      <tr>
      <td class="tdd">
        <?php
        print($row["p_id"]);
        ?>
      </td>
      <td>
        <?php
        print($row["p_name"]);
        ?>
       </td>
      <td>
        <?php
        print($row["base_amount"]);
        ?>
      </td>
      <td>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
        ?>
      </td>

  </tr>
  <?php
    }
  }else {
    print 'null';
  }
}
  ?>
</table>


  </body>
</html>
