<?php
$connection =mysqli_connect("localhost" ,"root" ,"" ,"NetBanking");
session_start();
if(!empty($_POST["login"]))
{
  $Customer_id  =$_POST["Customer_id"];
  $Password =$_POST["Password"];
  $result = mysqli_query($connection ,"SELECT * FROM Users WHERE Customer_id  ='$Customer_id' AND Password ='$Password'");

  if( $row =mysqli_fetch_array($result)){
    $status = $row["Staus"];
      if($status!="Activated"){
        $message ="You can not login untill you are verified";
      } else{
      $_SESSION["Customer_id"] =$row["Customer_id"];
      }
  }else{
    $message ="Invalid credentials";
  }
}
if(!empty($_POST["logout"]))
{
  $_SESSION="";
  session_destroy();
}
?>
<?php include "static/header.html";
if(empty($_SESSION['Customer_id'])){
  ?>
    <form class="form" action="user.php" method="post">
      <div class="err_msg">
        <?php if(isset($message)) echo $message; ?>
      </div>
       <div>
            <!-- <strong><span class="label1">USERNAME:</span></strong> -->
              <input class="input1" type="text" name="Customer_id" placeholder="Customer Id" value="">
        </div>
        <div>
             <!-- <strong><span class="label1">PASSWORD:</span></strong> -->
              <input class="input1" type="password" name="Password" placeholder="Password" value="">
        </div>
        <div>
              <input class="button1" type="submit" name="login" value="User Login">
        </div>
        <div>
           <p>Don't have accoutn  <a href="register.php">Register here</a></p>
        </div>
    </form>
<?php } else {
   echo $_SESSION["Customer_id"];
   echo "<form  action='user.php' method='post'>
       <input type='submit' class='link1' name='logout' value='Logout'>
   </form>";
} ?>
