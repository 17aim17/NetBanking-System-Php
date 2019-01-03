<?php
include "static/header.html";
require_once("connect.php");
$message ="";
echo "<title>Register Here</title>
      <div class='nav'>
        <li> <a href='./index.php'>home</a></li>
        <li> <a href='./user_login.php'>Sign In Insted</a></li>
      </div>";

      function abc($imagetype){
            if(empty($imagetype)){ return false ;}
            switch ($imagetype) {
                case 'image/bmp':
                    return ".bmp";
              case 'image/jpeg':
                    return ".jpg";
              case 'image/JPG':
                    return ".jpg";
              case 'image/png':
                    return ".png";
            }
          }

if(isset($_POST["register"])){
  $a = $_POST["cid"];
  $b =$_POST["an"];
  $c1 =$_POST["p1"];
  $c2 =$_POST["p2"];
  $d =$_POST["name1"];
  $e =$_POST["fname"];
  $f =$_POST["gender"];
  $g =$_POST["dob"];
  $h =$_POST["email"];
  $i =$_POST["pn"];
  $j =$_POST["acn"];
  $k=$_POST["add"];
 $date  =date("Y-m-d");

   $find = "SELECT * FROM Users WHERE Customer_id = '$a'";
   $res1 =$connection->query($find);
   $row= mysqli_num_rows($res1);

    if($row==0){
     if($c1==$c2){
     
       if(!empty($_FILES["file1"]["name"])){
       
         $file_name =$_FILES["file1"]["name"];
         $temp_name =$_FILES["file1"]["tmp_name"];
         $imagetype =$_FILES["file1"]["type"];

         $extension =abc($imagetype);
         $imagename =$a.$extension;
         $target = "./photos/".$imagename;
      
         if(move_uploaded_file($temp_name,$target)){
         
           $query ="INSERT INTO Users VALUES('$a','$b','$c1','$d' ,'$e' ,10 ,'$f' ,'$g' ,'$h' ,'$i' ,'$j' ,'$k','$imagename' ,'Pending' ,'$date')";
           $result =$connection->query($query);
         
            if($result){  $message ="Form Submit Succesfuly Wait for Authentiction" ;}
            else { $message ="Sorry Error occured please try again later" ;}
         }
       }


     } else{   $message ="Password Does not match";   }
    } else{  $message ="Account Already Exits";  }

}

 ?>

<form class="" action="register.php" method="post" enctype="multipart/form-data">
  <?php if($message!=""){echo "<div class='err_msg'>$message</div>";} ?>
  <table>
  <tr>
    <th>Customer ID</th>
    <td><input   class="input1" type="text" required name="cid" value=""> </td>
  </tr>
  <tr>
    <th>Account Number</th>
    <td><input  class="input1" type="text" required name="an" value=""> </td>
  </tr>
  <tr>
    <th>Choose Password</th>
    <td><input  class="input1" type="password" required name="p1" value=""> </td>
  </tr>
  <tr>
    <th>Re-Enter Password</th>
    <td><input  class="input1" type="password"  required name="p2" value=""> </td>
  </tr>
  <tr>
    <th>Name</th>
    <td><input  class="input1" type="text"  required name="name1" value=""> </td>
  </tr>
  <tr>
    <th>Father's Name</th>
    <td><input  class="input1" type="text"required name="fname" value=""> </td>
  </tr>
  <tr>
    <th>Gender</th>
    <td><input type="radio" name="gender" value="male">Male  <input type="radio" checked name="gender" value="female"> Female </td>
  </tr>
  <tr>
    <th>Date Of Birth</th>
    <td><input   class="datefield" type="date" required name="dob" value=""> </td>
  </tr>
  <tr>
    <th>Email</th>
    <td><input  class="input1" type="email" required name="email" value=""> </td>
  </tr>
  <tr>
    <th>Phone number</th>
    <td><input  class="input1" type="text" required name="pn" value=""> </td>
  </tr>
  <tr>
    <th>Aadhar Card Number</th>
    <td><input  class="input1" type="number" name="acn" value=""> </td>
  </tr>
  <tr>
    <th>Full Address</th>
    <td><input  class="input1" type="text"  name="add" value=""> </td>
  </tr>
  <tr>
    <th>Image</th>
    <td><input  class="image" type="file"  name="file1" value=""> </td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:center"><input type="submit" class="simplebutton" name="register" value="Register"> </td>
  </tr>
</table>
</form>
