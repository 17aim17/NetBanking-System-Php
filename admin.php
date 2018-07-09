<?php
$connection =mysqli_connect("localhost" ,"root" ,"" ,"NetBanking");
session_start();
if(!empty($_POST["login"]))
{
  $Username =$_POST["Username"];
  $Password =$_POST["Password"];
  $result = mysqli_query($connection ,"SELECT * FROM Admin WHERE Username ='$Username' AND Password ='$Password'");

  if( $row =mysqli_fetch_array($result)){
    $_SESSION["Username"] =$row["Username"];
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
if(empty($_SESSION['Username'])){
  ?>
  <title>Admin Login</title>
      <div class="page-header">
          <div class="head">
            <h1>Admin login Area <br>Coporate use Only</h1>
          </div>
          <div class="nav">
            <ul>
              <li> <a href="index.php">Home</a> </li>
              <li> <a  href="./admin.php">Admin Panel</a> </li> 
            </ul>
          </div>
      </div>
    <form class="form" action="admin.php" method="post">
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

<?php  include "static/footer.html";
}
 else{
  include "adminpanel.php";

  include "static/footer.html";
} ?>
