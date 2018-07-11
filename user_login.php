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
      if($status!="ACTIVATED"){
        $message ="You can not login untill you are verified";
      } else{
      $_SESSION["Customer_id"] =$row["Customer_id"];
      header("location:user.php");
      }
  }else{
    $message ="Invalid credentials";
  }
}

?>
<?php include "static/header.html";
  echo "<title>User Login</title>";
?>
    <form class="form" action="" method="post">
      <div class="err_msg">
        <?php if(isset($message)) echo $message; ?>
      </div>
       <div>
              <input class="input1" type="text" name="Customer_id" placeholder="Customer Id" value="">
        </div>

        <div>
              <input class="input1" type="password" name="Password" placeholder="Password" value="">
        </div>
        <div>
              <input class="button1" type="submit" name="login" value="User Login">
        </div>
        <div>
           <p>Don't have account ? <a href="register.php"><strong>Register here</strong></a></p>
        </div>
    </form>
