<?php
$connection =mysqli_connect("localhost","root","","NetBanking");
session_start();
if(!empty($_SESSION["Username"])){
  include "static/header.html";
  echo "<title>Authenticate users </title>";
  echo " <div class='page-header'>
      <div class='head'>
        <h1>All Pending Users</h1>
      </div>";
    include "static/adminnav.html" ;
  echo "</div>";
    if(!empty($_POST["Authenticate"])){
      $key = $_POST["t1"];
      $modify = "UPDATE Users SET Staus ='ACTIVATED' WHERE Customer_id='$key'";
      $res =$connection->query($modify);


  }
    $res2 =mysqli_query($connection , "SELECT * FROM Users WHERE Staus='Pending'");
    while($result =mysqli_fetch_array($res2)){
      $a = $result["Customer_id"];
      $b = $result["Account_number"];
      $c = $result["Name"];
      $d = $result["Fathers_name"];
      $e = $result["Gender"];
      $f = $result["Date_of_birth"];
      $g = $result["Phone"];
      $h = $result["Aadhar_number"];
      $i = $result["Address"];
      $j = $result["Photo"];
      $k = $result["Staus"];
      $l =$result["Date"];

      echo" <table> <form method='post' action=''> <input type='hidden' name ='t1' value=$a>";
      echo" <tr>
                <th>Customer ID</th>
                <td>$a</td>
           </tr>
           <tr>
                <th>Account Number</th>
                <td>$b</td>
           </tr>
           <tr>
                <th>Name</th>
                <td>$c</td>
           </tr>
           <tr>
                <th>Fathers Name</th>
                <td>$d</td>
           </tr>
           <tr>
                <th>Gender</th>
                <td>$e</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>$f</td>
            </tr>
            <tr>
                <th>Contact</th>
                <td>$g</td>
            </tr>
            <tr>
                <th>Aadhar Number</th>
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
            <tr>
               <td style='text-align:center' colspan =2><input type='submit' class='simplebutton' value='Authenticate' name='Authenticate'></td>
            </tr>
            </form>
            </table>
            ";

     }
     include "static/footer.html";
} else{
  include "static/header.html";
  echo "<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>";
}
?>
