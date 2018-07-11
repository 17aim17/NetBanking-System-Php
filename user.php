<?php
include "static/header.html";
session_start();
if(!empty($_SESSION["Customer_id"])){
    $un =$_SESSION["Customer_id"];
    $connection =mysqli_connect("localhost","root","","NetBanking");
    $query ="SELECT Name FROM Users WHERE Customer_id ='$un'";
    $result =$connection->query($query);
    if($row =mysqli_fetch_array($result)){
      $name =$row["Name"];
    }


    include "static/usernav.php";
    echo "<title>User Dashboard</title>";
    echo "<p class='sucess_msg'>welcome $name</p>";
} else{
  echo "<div class='err_msg'>Unauthorize Access !! You can not Access this page directly</div>";
}
?>
