<?php

include "static/header.html";
session_start();
if(!empty($_SESSION["Username"])){
    include "static/adminnav.php";
    $a =$_SESSION["Username"];
    echo "<title>Admin Dashboard</title>";
    echo "<p class='sucess_msg'>welcome $a</p>";
  } else{
    echo "<div class='err_msg'>Unauthorize Access !! You can not Access this page directly </div>";
  }
?>
