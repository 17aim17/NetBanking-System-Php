<?php
session_start();
include "static/header.html";
$connection =mysqli_connect("localhost" ,"root" ,"" ,"NetBanking");
 $message ="";
 $accno ="";
 ?>


<?php if(!empty($_SESSION["Username"])){
  echo "<title>Get Customer Statement</title>";
  include "static/adminnav.php";
?>
<div>
<form class= action="statement.php" method="post">
  <table>
    <tr>
      <td> <input type="text" class="input1" name="accno" placeholder="Account Number" value="<?php echo $accno ?>"> </td>
      <td><input type="submit" class="simplebutton" name="get" value="Get Statement"> </td>
    </tr>
  </table>
</form>
</div>
<?php } else {
  echo"<div class='err_msg'>
    Unauthorize Access !! You can not Access this page directly
  </div>";
 } ?>

 <?php
 if(isset($_POST["get"])){
       $accno =$_POST["accno"];
       $query ="SELECT * FROM Users WHERE Account_number='$accno'";
       $result =$connection->query($query);
   if($row=mysqli_fetch_array($result)){
         $get ="SELECT * FROM Transactions WHERE Account_number ='$accno'";
         $res =$connection->query($get);
         $row=mysqli_num_rows($res);
     if($row>0){
           echo "<div class='res-tb'><table class='table1'> <tr>
                   <th>Transaction Id</th>
                   <th>Amount</th>
                   <th>Type</th>
                   <th>Date</th>
                   <th>Details</th>
             </tr>";
             while( $res2 =mysqli_fetch_array($res)){
               $a =$res2["Transaction_id"];
               $b =$res2["Amount"];
               $c =$res2["Type"];
               $d =$res2["Date_of_transaction"];
               $e =$res2["Details"];

               echo "<tr><td>$a</td>
                     <td>$b</td>
                     <td>$c</td>
                     <td>$d</td>
                     <td>$e</td></tr>";
             }
             echo "</table></div>";
     } else{
       echo "<div class='err_msg'>No Transactions by User </div>";
     }
   }
    else{
     echo"<div class='err_msg'>invalid User</div>";
   }
 }
 ?>
