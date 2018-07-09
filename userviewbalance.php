<?php
session_start();
$connection =mysqli_connect("localhost" ,"root","","NetBanking");

include"static/header.html";
if(!empty($_SESSION["Customer_id"])){
  echo "<title>Check Account Balance</title>
      <div class='page-header'>
          <div class='head'>
            <h1>Check Account Balance</h1>
          </div>
          <div class='nav'>
             <li> <a href='./user.php'>User Panel</a></li>
           </div>
        </div>";
$un =$_SESSION["Customer_id"];
$balance ="SELECT * FROM Users WHERE Customer_id='$un'";
$result =$connection->query($balance);
while($res =mysqli_fetch_array($result)){
  $a =$res["Customer_id"];
  $b =$res["Account_number"];
  $c =$res["Name"];
  $d =$res["Fathers_name"];
  $e =$res["Balance"];

  echo "<table class='no-border'>
       <tr>
          <th>Customer ID</th>
          <td>  $a </td>
       </tr>
       <tr>
          <th>Account Number</th>
          <td>  $b </td>
       </tr>
       <tr>
          <th>Full Name</th>
          <td>  $c </td>
       </tr>
       <tr>
          <th>Fathers Name</th>
          <td>  $d </td>
       </tr>
       <tr>
          <th>Account Balance</th>
          <td>  $e </td>
       </tr>
  </table>";
}
} else{
  echo "<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>";
}
?>
