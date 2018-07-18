<?php
$a ="";
include "static/header.html";
include "static/adminnav.php";
require_once("connect.php");
if(isset($_POST['finduser'])){
  $a =$_POST["finduser"];
}
?>

<form action='viewuser.php' method='post'>
<table>
<tr>
  <th>
    <input type='text' class='input1' placeholder='Account Number' value="<?php echo $a ?>" name='finduser'>
  <th>
  <th>
    <input type='submit' class='simplebutton' name='search' value='Search'>
  </th>
</tr>
</table>
</form>
<?php
if(isset($_POST["search"])){
            $var = $_POST["finduser"];
            echo "<title>User $var </title>";
            $res =mysqli_query($connection , "SELECT * FROM Users WHERE Account_number ='$a'");
            $row =mysqli_num_rows($res);
            if($row==1){
              while($result =mysqli_fetch_array($res))
              {
                $a = $result["Customer_id"];
                $b = $result["Account_number"];
                $c = $result["Name"];
                $d =$result["Fathers_name"];
                $e =$result["Balance"];
                $f = $result["Gender"];
                $g = $result["Date_of_birth"];
                $h =$result["Email"];
                $i = $result["Phone"];
                $j = $result["Aadhar_number"];
                $k = $result["Address"];
                $l = $result["Photo"];
                $m = $result["Status"];
                $n =$result["Date"];
              }


            echo"<div class='res-tb'><table class='table1'>
                      <tr>
                          <th>User Image</th>
                          <td> <img src='photos/$l' width=100px height=auto> </td>
                      </tr>
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
                        <th>Father's Name</th>
                          <td>$d</td>
                      </tr>
                      <tr>
                          <th>Balance</th>
                          <td>$e</td>
                      </tr>
                      <tr>
                          <th>Gender</th>
                          <td>$f</td>
                      </tr>
                      <tr>
                          <th>DOB</th>
                          <td>$g</td>
                      </tr>
                       <tr>
                          <th>Email Id</th>
                          <td>$h</td>
                       </tr>
                       <tr>
                          <th>Contact no.</th>
                          <td>$i</td>
                       </tr>
                        <tr>
                          <th>Aadhar No.</th>
                          <td>$j</td>
                        </tr>
                        <tr>
                          <th>Address</th>
                          <td>$k</td>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td>$m</td>
                        </tr>
                         <tr>
                            <th>Date Applied</th>
                            <td>$n</td>
                         </tr>
                      </table></div>";

            }
            else {
              echo "<div class='err_msg'>No User Found</div>";
            }
}

 ?>
