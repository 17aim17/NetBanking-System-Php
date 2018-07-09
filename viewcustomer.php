<?php
  $connection = mysqli_connect("localhost","root","","NetBanking");
  session_start();
  $accno ="";
  $name ="";
  $fname ="";
  $balance ="";
  $message ="";
  if(isset($_POST["view"])){
    $accno =$_POST["accno"];
    $query ="SELECT * FROM Users WHERE Account_number='$accno'";
    $result =$connection->query($query);
    $res =mysqli_fetch_array($result);
    if($res){
      $name = $res["Name"];
      $fname =$res["Fathers_name"];
      $balance =$res["Balance"];
    }
    else{
      $message ="Account does not exists";
    }

  }

?>
<?php   include "static/header.html";
if(!empty($_SESSION["Username"])){
  echo "<title>View Users</title>";
  echo " <div class='page-header'>
      <div class='head'>
        <h1>View Users Details</h1>
      </div> </div>";
  include "static/adminnav.html";
?>
<form class="" action="viewcustomer.php" method="post">
  <?php if($message!="") echo "<div class='err_msg'>$message</div>"; ?>
        <table class="no-border">
              <tr>
                <th><span class="label1">Account Number.</span></th>
                <td><input type="text" class="input1" name="accno" value="<?php echo $accno ?>"></td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:center"><input class="simplebutton" type="submit" name="view" value="View User"></td>
              </tr>
              <tr>
                <th><span class="label1">Customer Name</span></th>
                <td><input type="text" readonly class="input1"  name="name" value="<?php echo $name ?>"></td>
              </tr>
              <tr>
                <th><span class="label1">Fathers name</span></th>
                <td><input type="text" readonly class="input1"  name="fname" value="<?php echo $fname ?>"></td>
              </tr>
              <tr>
                <th><span class="label1">Balance</span></th>
                <td><input type="text" readonly class="input1"  name="balance" value="<?php echo $balance ?>"></td>
              </tr>
      </table>
</form>
<?php }  else{ ?>
  <div class="err_msg">
      <?php echo "Unauthorize Access !! You can not Access this page directly "; ?>
  </div>
<?php } ?>
