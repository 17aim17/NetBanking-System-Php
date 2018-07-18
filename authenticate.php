<?php
require_once("connect.php");
session_start();
$i=0;
if(!empty($_SESSION["Username"])){
  include "static/header.html";
  echo "<title>Authenticate users </title>";
    include "static/adminnav.php" ;
    if(!empty($_POST["Authenticate"])){
      $key = $_POST["t1"];
      $modify = "UPDATE Users SET Status ='Activated' WHERE Account_number='$key'";
      $res =$connection->query($modify);
      }
      $res2 =mysqli_query($connection , "SELECT * FROM Users WHERE Status='Pending'");
      $row =mysqli_num_rows($res2);
      if($row>0){
?>
      <div class="res-tb">
      <table class="table1">
        <tr>
          <th>Sr No.</th>
          <th>Acc No.</th>
          <th>Name</th>
          <th>Date applied</th>
          <th>Action</th>
        </tr>
<?php


        while($result =mysqli_fetch_array($res2)){
          $a = $result["Account_number"];
          $b = $result["Name"];
          $c =$result["Date"];
            ++$i;
            $c =substr($c,0,10);
          echo" <tr>
                  <form method='post' action=''> <input type='hidden' name ='t1' value=$a>
                  <td>$i</td>
                  <td>$a</td>
                  <td>$b</td>
                  <td>$c</td>
                  <td><input type='submit' class='simplebutton' value='Authenticate' name='Authenticate'></td>
                  </form>
                </tr>";
         }
         echo "</table> </div>";
   }else{
     echo "<div class='err_msg'>No Users </div>";
   }
}
else
{
  include "static/header.html";
  echo "<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>";
}
?>
