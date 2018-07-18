<?php
$accno ="";
$name ="";
$fname ="";
$message ="";
$balance ="";
session_start();
require_once("connect.php");
if(isset($_POST["view"])){
  $accno =$_POST["accno"];
  $query ="SELECT * FROM Users WHERE Account_number='$accno'";
  $result =$connection->query($query);
  $row =mysqli_fetch_array($result);
  if($row){
    $name = $row["Name"];
    $fname =$row["Fathers_name"];
    $cid =  $row["Customer_id"];
    $_SESSION["cid"] =$cid;
    $_SESSION["account"] =$row["Account_number"];
    $balance =$row["Balance"];
    $_SESSION["balance"] =$balance;

  }
   else{
    $message ="invalid Users";
  }
}

if(!empty($_SESSION["account"])){
   $accno =$_SESSION["account"];
   $currentbalance=$_SESSION["balance"];
   $tid ="AS".date('Y').$_SESSION["cid"].time();
    if(isset($_POST["deposit"])){
        if(!empty($_POST["amount"])){
          $amount =$_POST["amount"];
          $tod =$_POST["tod"];
          $insert ="INSERT INTO Transactions (Transaction_id, Account_number ,Amount, Type ,Details) VALUES ('$tid','$accno' ,$amount ,'Credit','$tod')";
          $res2 =$connection->query($insert);
          $newbalance = $currentbalance + $amount;
          $update ="UPDATE Users SET Balance =$newbalance WHERE Account_number='$accno'";
          $res3 =$connection->query($update);
          if($res3){
            $message ="Amount Credit Successfully";
          } else{
            $message ="Error Occured";
          }
        } else{
          die("Enter an Amount");
        }
        unset($_SESSION["balance"]);
        unset($_SESSION["account"]);
      }
}
?>
<?php
 include "static/header.html";
if(!empty($_SESSION["Username"])){
  echo "<title>Deposit in Account</title>";
  include "static/adminnav.php";
  ?>
  <div class="">
    <?php if($message!="") echo "<div class='err_msg'>$message</div>"; ?>
  </div>
    <form class="" action="deposit.php" method="post">
      <table id="deposit">
      <tr>
        <td><span class="label1">Account Number</span></td>
        <td><input type="text" name="accno" class="input1" value="<?php echo $accno ?>"> </td>
      </tr>
      <tr>
        <td style="text-align :center"colspan="2"><input class="simplebutton" type="submit" name="view" value="Verify User">  </td>
      </tr>
      <tr>
        <td><span class="label1">Name</span></td>
        <td><input type="text" name="name" class="input1" readonly value="<?php echo $name ?>"> </td>
      </tr>
      <tr>
        <td><span class="label1">Fathers Name</span></td>
        <td><input type="text" name="fname" class="input1" readonly value="<?php echo $fname ?>"> </td>
      </tr>
      <tr>
        <td><span class="label1">Current Balance</span></td>
        <td> <input type="number" readonly name="balance" class="input1" readonly value="<?php echo $balance ?>"> </td>
      </tr>
       <tr>
         <td style="text-align:center"colspan="2"><span class="sucess_msg">Deposit Details Fill Here</span></td>
       </tr>
       <tr>
         <td><span class="label1">Credit Amount</span></td>
         <td><input type="number" class="input1" name="amount" value=""> </td>
       </tr>
       <tr>
         <td><span class="label1">Details</span></td>
         <td><input type="text" class="input1" name="tod" value=""> </td></td>
       </tr>
       <tr>
         <td style="text-align:center"colspan="2"><input class="simplebutton" type="submit" name="deposit" value="Deposit"> </td>
       </tr>
      </table>
     </form>

<?php } else{ ?>
  <div class="err_msg">
    <?php echo "Unauthorize Access !! You can not Access this page directly"; ?>
  </div>
<?php } ?>
