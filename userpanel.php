<?php
$un =$_SESSION["Customer_id"];
$connection =mysqli_connect("localhost","root","","NetBanking");
$query ="SELECT Name FROM Users WHERE Customer_id ='$un'";
$result =$connection->query($query);
if($row =mysqli_fetch_array($result)){
  $name =$row["Name"];
}
?>


<title>User Panel</title>
<div class="page-header">
   <div class="head">
     <h1>Welcome  <?php echo $name; ?> <br>Thanks for Visiting Us</h1>
   </div>
     <div class="nav">
      <li> <a href="userchangepassword.php">Change Password</a> </li>
      <li> <a href="userviewbalance.php">View Balance</a> </li>
      <li> <a href="userstatement.php">Get Statement</a></li>
      <li> <form class="" action="" method="post">
          <input type="submit" class="link1" name="logout" value="Logout">
      </form> </li>
    </div>
</div>
