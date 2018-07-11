<?php
session_start();
include "static/header.html";
if(!empty($_SESSION["Username"])){
$connection =mysqli_connect("localhost","root" ,"" ,"NetBanking");
echo "<title>List Of All Users</title>";

include "static/adminnav.php";
  $res2 =mysqli_query($connection , "SELECT * FROM Users");
  while($result =mysqli_fetch_array($res2)){
    $a = $result["Customer_id"];
    $b = $result["Account_number"];
    $c = $result["Name"];
    $d = $result["Gender"];
    $e = $result["Date_of_birth"];
    $f =$result["Email"];
    $g = $result["Phone"];
    $h = $result["Aadhar_number"];
    $i = $result["Address"];
    $j = $result["Photo"];
    $k = $result["Staus"];
    $l =$result["Date"];
echo"<table>
          <tr>
              <th>Customer ID</th>
              <td>$a</td>
          </tr>
          <tr>
              <th>Account No</th>
              <td>$b</td>
          </tr>
          <tr>
              <th>Name</th>
              <td>$c</td>
          </tr>
          <tr>
            <th>Gender</th>
              <td>$d</td>
          </tr>
          <tr>
              <th>DOB</th>
              <td>$e</td>
          </tr>
          <tr>
              <th>Email</th>
              <td>$f</td>
          </tr>
          <tr>
              <th>Contact No.</th>
              <td>$g</td>
          </tr>
           <tr>
              <th>Aadhar No.</th>
              <td>$h</td>
           </tr>
           <tr>
              <th>Address</th>
              <td>$i</td>
           </tr>
            <tr>
              <th>Image</th>
              <td><img src='photos/$j' width='80px' height='auto'></td>
            </tr>
            <tr>
              <th>Status</th>
              <td>$k</td>
            </tr>
            <tr>
              <th>Date Applied</th>
              <td>$l</td>
            </tr>
          </table>
        ";
}
}
else{
  echo "<div class='err_msg'>Unauthorize Access !! You can not Access this page directly </div>";
}
 ?>
