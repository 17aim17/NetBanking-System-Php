<?php
session_start();
include "static/header.html";
if(!empty($_SESSION["Username"])){
          require_once("connect.php");
          echo "<title>List Of All Users</title>";
          static $i=0;
          include "static/adminnav.php";
          $res2 =mysqli_query($connection , "SELECT * FROM Users");
?>
                  <div class="res-tb">
                  <table class="table1">
                    <tr>
                      <th>Sr No.</th>
                      <th>Acc No.</th>
                      <th>Name</th>
                      <th>Balance</th>
                      <th>Action</th>
                    </tr>
          <?php
                  while($result =mysqli_fetch_array($res2))
                  {
                    $a = $result["Account_number"];
                    $n = $result["Name"];
                    $b =$result["Balance"];
                    $_SESSION['viewuser'] =$a;
                    ++$i;
                    echo" <tr><form method='post' action='viewuser.php'> <input type='hidden' name ='finduser' value=$a>
                            <td>$i</td>
                            <td>$a</td>
                            <td>$n</td>
                            <td>$b</td>
                            <td><input type='submit' class='simplebutton' name='search' value='Search'></form></td>
                          </tr> ";
                    }
          echo "</table></div>";
}
else{
  echo "<div class='err_msg'>Unauthorize Access !! You can not Access this page directly </div>";
}
 ?>
