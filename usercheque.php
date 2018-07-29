<?php
require_once("connect.php");
  session_start();
  include"static/header.html";
  if(!empty($_SESSION["Customer_id"])){
  $un =$_SESSION["Customer_id"];
  $find ="SELECT Account_number FROM Users WHERE Customer_id ='$un'";
  $result= $connection->query($find);
      if($row =mysqli_fetch_array($result))
      {
        $acc =$row["Account_number"];
        $_SESSION["acc"] =$acc;
      }
      echo "<title>Request For check book</title>";
      include "static/usernav.php";
      if(isset($_POST["apply"]))
      {
            $a = $_POST["number"];
            $i =0;
            $count = "SELECT COUNT(*) AS COUNT FROM Cheque";
            $result1 =$connection->query($count);
            if($row =mysqli_fetch_array($result1))
            {
              $i =$row["COUNT"];
            }
            $req_id =++$i;
            if($a>=10 && $a<=50)
            {
              $acc =$_SESSION["acc"];
              $query ="INSERT INTO Cheque (Request_id ,Account_number ,Num_of_cheques ,Status ) VALUES ($req_id ,'$acc',$a,'Pending')";
              $result2 =$connection->query($query);
              if($result2) { echo "<div class='sucess_msg'>Successfully Applied for checkbook</div>"; }
              else { echo "<div class='err_msg'>Unable to process request</div>";}
            }
            else {
              echo "<div class='err_msg'>Please choose from 10 t0 50 Only</div>";
            }
      }
      function isapplied()
      {
        global $connection;
        $acc =$_SESSION['acc'];
        $x ="SELECT * FROM Cheque WHERE Account_number='$acc' AND Status='Pending' ";
        $res =$connection->query($x);
        $row =mysqli_num_rows($res);
        if($row==0){
          return false;
        }
        return true;
      }
    if(isapplied())
     {
       echo "<div class='sucess_msg'>You already applied for checkbook</div>";
     }
     else{
      echo '<form class="" action="" method="post">
        <table class="">
          <tr>
            <td> <input type="number" class="input1" name="number" required placeholder="Number of checks" value=""> </td>
          </tr>
          <tr>
            <td style="text-align:center"><input type="submit" class="simplebutton" name="apply" value="Apply"> </td>
          </tr>
        </table>
      </form>';
    }
} else {
echo "<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>";
} ?>
