<?php
require_once("connect.php");
session_start();
if(!empty($_POST["login"]))
{
  $Username =$_POST["Username"];
  $Password =$_POST["Password"];
  $result = mysqli_query($connection ,"SELECT * FROM Admin WHERE Username ='$Username' AND Password ='$Password'");

  if( $row =mysqli_fetch_array($result)){
    $_SESSION["Username"] =$row["Username"];
    header("location:admin.php");
  }else{
    $message ="Invalid credentials";
  }
}
 include "static/header.html";?>
  <title>Admin Login</title>
    <form class="form" action=" " method="post">
      <div class="err_msg">
        <?php if(isset($message)) echo $message; ?>
      </div>
       <div>
             <input class="input1" type="text" name="Username" placeholder="Username" value="">
        </div>
        <div>
              <input class="input1" type="password" name="Password" placeholder="Password" value="">
        </div>
        <div>
             <input class="button1" type="submit" name="login" value="Admin LogIn">
        </div>
    </form>
