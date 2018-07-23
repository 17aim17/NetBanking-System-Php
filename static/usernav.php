<?php  include"page-header.inc" ;?>
     <div class="nav">
      <li> <a href="userchangepassword.php">Change Password</a> </li>
      <li> <a href="userviewbalance.php">View Balance</a> </li>
      <li> <a href="userstatement.php">Acconnt summary</a></li>
      <li> <a href="userpayment.php">Make Payment</a> </li>
      <li> <a href="usercheck.php">Req Check book</a></li>
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
