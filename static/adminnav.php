<?php  include"page-header.inc" ;?>

     <div class="nav">
      <li> <a href="adminchangepassword.php">Change Password</a> </li>
      <li> <a href="authenticate.php">Auth User</a> </li>
      <li> <a href="viewuser.php">View User</a> </li>
      <li> <a href="viewall.php">View All</a> </li>
      <li> <a href="deposit.php">Deposit</a> </li>
      <li> <a href="withdraw.php">Withdraw</a></li>
      <li> <a href="cheque.php">Cheque </a> </li>
      <li> <a href="adminpayment.php">transfers</a> </li>
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
