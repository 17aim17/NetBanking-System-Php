<?php
$connection =mysqli_connect("localhost","root","","NetBanking");
session_start();
$i=0;
if(!empty($_SESSION["Username"])){
  include "static/header.html";
  echo "<title>Check all Online Transactions </title>";
    include "static/adminnav.php" ;
      $res =mysqli_query($connection , "SELECT * FROM Payment");
      $row =mysqli_num_rows($res);
      if($row>0){
?>
      <div class="res-tb">
      <table class="table1">
        <tr>
          <th>Sr No.</th>
          <th>Txn Id.</th>
          <th>Acc From</th>
          <th>Acc To</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Remarks</th>
        </tr>
<?php


        while($result =mysqli_fetch_array($res)){
          $a = $result["Transaction_id"];
          $b = $result["Transfer_from"];
          $c = $result["Transfer_to"];
          $d = $result["Amount"];
          $e = $result["Date"];
          $f = $result["Remarks"];
            ++$i;
            $c =substr($c,0,10);
          echo" <tr>
                  <td>$i</td>
                  <td>$a</td>
                  <td>$b</td>
                  <td>$c</td>
                  <td>$d</td>
                  <td>$e</td>
                  <td>$f</td>
                </tr>";
         }
         echo "</table> </div>";
         
   }else{
     echo "<div class='err_msg'>No Records </div>";
   }
}
else
{
  include "static/header.html";
  echo "<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>";
}
?>
