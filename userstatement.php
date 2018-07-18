<?php
session_start();
include"static/header.html";
require_once("connect.php");
if(!empty($_SESSION["Customer_id"])){
$un =$_SESSION["Customer_id"];
echo "<title>Account Statement</title>";
include "static/usernav.php";
?>


<form class="" action="" method="post">
  <table class="">
    <tr>
      <td>Start Date</td>
      <td> <input type="date" class="datefield" name="sd" value=""> </td>
    </tr>
    <tr>
      <td>End Date</td>
      <td> <input type="date" name="ed" class="datefield" value=""> </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center"><input type="submit" class="simplebutton" name="st" value="View Statement"> </td>
    </tr>
  </table>
</form>

<?php
if(isset($_POST["st"])){
  $un =$_SESSION["Customer_id"];
  $a = $_POST["sd"];
  $b =$_POST["ed"];
  $find ="SELECT Account_number FROM Users WHERE Customer_id ='$un'";
  $result=   $connection->query($find);
  if($row =mysqli_fetch_array($result)){
    $acc =$row["Account_number"];
      $query ="SELECT * FROM Transactions WHERE Account_number='$acc' AND Date_of_transaction BETWEEN '$a 00:00:00' AND '$b 00:00:00' ";
      // echo "$query";
      $result2 =$connection->query($query);
      if($found =mysqli_num_rows($result2)){
        echo "<div class='res-tb'><table class='table1'>
          <tr><th>Transaction ID</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Type</th>
          <th>Details</th>
          </tr> ";
        while($row2 =mysqli_fetch_array($result2)){
            $a =$row2["Transaction_id"];
            $b=$row2["Amount"];
            $c =$row2["Date_of_transaction"];
            $d =$row2["Type"];
            $e =$row2["Details"];
            echo "<tr>
                  <td>$a</td>
                  <td>$b</td>
                  <td>$c</td>
                  <td>$d</td>
                  <td>$e</td>
               </tr>";
        }
        echo "</table></div>";
      } else{
        echo "<span class='err_msg'>No transactions on during selected period</span>";
      }
   }
}
}else{
  echo "<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>";

}
 ?>
