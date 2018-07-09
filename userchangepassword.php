<?php
 session_start();
 include"static/header.html";
  $connection =mysqli_connect("localhost" ,"root" ,"","NetBanking");
  $message ="";
  if(isset($_POST["change"])){
     $un =$_SESSION["Customer_id"];
      $op = $_POST["op1"];
      $np1 =$_POST["np1"];
      $np2 =$_POST["np2"];
     $query = "SELECT * FROM Users WHERE Customer_id ='$un' AND Password='$op'";
     $result =$connection->query($query);
     $row = mysqli_num_rows($result);
     if($row==1){
        if($op!=$np1){
          if($np1==$np2){
            $update = "UPDATE Users SET Password ='$np1' WHERE Customer_id='$un'";
            $res1 =$connection->query($update);
            if($res1){ $message="Password Changed Successfully"; }
          } else{ $message="Passwords Does not match";}
        } else {$message ="New Password Must be Different from old ";}
     }else{
       $message ="Wrong Password";
     }
  }
 if(!empty($_SESSION["Customer_id"])){
   echo "<title>Change Password</title>
       <div class='page-header'>
           <div class='head'>
             <h1>Change Password Here</h1>
           </div>
           <div class='nav'>
              <li> <a href='./user.php'>User Panel</a></li>
            </div>
         </div>";
?>
   <form class="" action="" method="post">
     <?php if($message!="")  echo "<div class='err_msg'>$message</div>"; ?>
          <div>
             <input type="password" class="input1" required name="op1" value="" placeholder="Old PASSWORD">
          </div>
          <div>
             <input type="password"  class="input1" required name="np1" placeholder="New PASSWORD" value="">
          </div>
         <div>
            <input type="password"  class="input1" required name="np2" value="" placeholder="Confirm New Password">
         </div>
         <div>
         <input type="submit"  class="button1" name="change" value="Change Password">
       </div>
   </form>
 <?php } else{
  echo"<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>";
 } ?>
