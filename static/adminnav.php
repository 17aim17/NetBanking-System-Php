<div class="page-header">
  <div class="head">
    <!-- <img src="" alt=""> -->
      <h1>Welcome To <br>bAnk of cHicAGo</h1>
  </div>
     <div class="nav">
      <li> <a href="adminchangepassword.php">Change Password</a> </li>
      <li> <a href="authenticate.php">Authenticate User</a> </li>
      <li> <a href="viewcustomer.php">View Customers</a> </li>
      <li> <a href="viewall.php">View All</a> </li>
      <li> <a href="deposit.php">Deposit</a> </li>
      <li> <a href="withdraw.php">Withdraw</a></li>
      <li> <a href="statement.php">Statement</a></li>
      <li> <form class="" action="" method="post">
          <input type="submit" class="link1" name="logout" value="Logout">
      </form> </li>
    </div>
</div>

<?php
if(!empty($_POST["logout"]))
{
  $_SESSION="";
  session_destroy();
  header("location:index.php");
}

 ?>
