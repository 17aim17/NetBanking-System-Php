<?php
$message ="";
$connection =mysqli_connect("localhost" ,"root","","NetBanking");
session_start();
if(!empty($_POST["change"])){
  $un =$_SESSION["Username"];
  $op =$_POST["oldpassword"];
  $np1 =$_POST["newpassword"];
  $np2 =$_POST["newpassword2"];

  $result = mysqli_query($connection ,"SELECT * FROM Admin WHERE Username='$un' AND Password ='$op'");
  $row = mysqli_num_rows($result);
  if($row==1){
     if($op!=$np1){
       if($np1==$np2){
         $query = "UPDATE admin SET Password ='$np1' WHERE Username='$un'";
         $res1 =$connection->query($query);
         if($res1){ $message="Password Changed Successfully"; }
       } else{ $message="Passwords Does not match";}
     } else {$message ="New Password Must be Different from old";}
  }else{
    $message ="Wrong  Password";
  }

}

?>
<?php
  include "static/header.html";
if(empty($_SESSION["Username"])) {?>

<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>
<?php } else {?>
  <title>Change Password</title>
      <div class="page-header">
          <div class="head">
            <h1>Change Password Here</h1>
          </div>
          <?php  include "static/adminnav.html" ;?>
      </div>
    <form class="" action="" method="post">
       <div class="err_msg">
         <?php if($message!="") echo "$message";?>
       </div>
            <div>
              <input type="password" class="input1" name="oldpassword" value="" placeholder="Old Password">
            </div>
            <div>
              <input type="password" class="input1"name="newpassword" value="" placeholder="New Password">
            </div>
            <div>
              <input type="password" class="input1" name="newpassword2" value="" placeholder="Re-Enter New Password">
            </div>
            <div>
               <input class="button1" type="submit" name="change" value="Change">
            </div>

    </form>
<?php include "static/footer.html" ; } ?>
