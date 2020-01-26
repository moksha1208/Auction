<?php
if(!isset($_SESSION['email']))
{
  header('location:login.php');
  exit();
}

 ?>

 <table border="1">
   <tr>
     <th>Product ID</th>
     <th>Name</th>
     <th>Amount</th>
     <th>Image</th>
   </tr>
    <!-- <?php
   $mysqlquery4 = "select * from `product` where sold=0";
   $result = $conn->query($mysqlquery4);
   $pid_array = Array();

 if (!$result) {  -->
 trigger_error('Invalid query: ' . $conn->error);
 }
   if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
         array_push($pid_array,$row['p_id'])
       ?>
       <tr>
       <td class="tdd">
         <?php
         print($row["p_id"]);
         ?>
       </td>
       <td>
       <!-- <a href="https://www.google.com"> -->

         <?php
         print($row["p_name"]);
         ?>

       <!-- </a> -->
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
   ?>
 </table>
 <?php
 print_r($pid_array);
 ?>
 </div>
