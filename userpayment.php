<?php
    include"static/header.html";
    session_start();
    if(!empty($_SESSION["Customer_id"])){

    $connection =mysqli_connect("localhost","root","","NetBanking");
    $receiver="";
    $un = $_SESSION["Customer_id"];
    $query ="SELECT * FROM Users WHERE Customer_id ='$un'";
    $result =$connection->query($query);
    if($row=mysqli_fetch_array($result))
    {
      $mybalance =$row["Balance"];
      $myaccount =$row["Account_number"];
     }


    if(isset($_POST["receiver"]))
    {
      $receiver = $_POST["receiver"];
    }

    ?>
<title>Make Payment</title>
<?php include "static/usernav.php"; ?>
      <form class= action="" method="post">
            <table>
              <tr>
                <th>My Balance</th>
                <td> <input type="text" class="input1" readonly  value="<?php echo $mybalance ?>"> </td>
              </tr>
              <tr>
                <th>Recipient Account number</th>
                <td> <input type="text" class="input1" name="receiver" value="<?php echo $receiver; ?>"> </td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:center"> <input type="submit" class="simplebutton" name="verify" value="Verify User"> </td>
              </tr>
              <?php
                if(isset($_POST["verify"]))
                {
                    $receiver = $_POST["receiver"];
                    $finduser ="SELECT * FROM Users WHERE Account_number='$receiver'";
                    $res =$connection->query($finduser);
                    $row =mysqli_num_rows($res);
                    if($row==1)
                    {
                       while($res2 =mysqli_fetch_array($res))
                       {
                         $name =  $res2["Name"];
                         $fname =$res2["Fathers_name"];
                         $_SESSION["recbalance"]= $res2["Balance"];
                          $_SESSION["cid2"] =$res2["Customer_id"];
                         include "recieverdetails.inc";
                       }
                    }
                    else
                    {
                      echo "<div class='err_msg'>Wrong Account number</div>";
                    }

                }
              ?>
</table>
</form>
<?php
  if(isset($_POST["pay"]) && !empty($_SESSION["recbalance"]))
  {
    $amount =$_POST["amount"];
    if($mybalance>$amount){
      $remarks =$_POST["remarks"];
      $recbalance=$_SESSION["recbalance"];
      $tid1 ="AS".date('Y').$_SESSION["Customer_id"].time();
      $tid2 ="AS".date('Y').$_SESSION["cid2"].time();
      echo "$tid1  ";
      echo "$tid2";
      //insert into transaction table my own
      $insert1 ="INSERT INTO Transactions (Transaction_id , Account_number,Amount,Type,Details) VALUES ('$tid1','$myaccount',$amount,'Debit','$remarks')";
      $result1 =$connection->query($insert1);

      // insert recierve transcation ie credit
      $insert2 ="INSERT INTO Transactions (Transaction_id ,Account_number,Amount,Type,Details) VALUES ('$tid2','$receiver',$amount,'Credit','$remarks')";
      $result2 =$connection->query($insert2);

      //updating own balance
      $mybalance =$mybalance-$amount;
      $update1 ="UPDATE Users SET Balance=$mybalance WHERE Account_number='$myaccount'";
      $result3 =$connection->query($update1);

      //updating reciever balance
      $recbalance =$recbalance+$amount;
      $update2 ="UPDATE Users SET Balance =$recbalance WHERE Account_number=$receiver";
      $result4 =$connection->query($update2);

      //inserting into payment table
      $insert3 ="INSERT INTO Payment(Transaction_id , Transfer_from ,Transfer_to ,Amount ,Remarks) VALUES ('$tid1' ,'$myaccount','$receiver',$amount,'$remarks')";
      $result5 =$connection->query($insert3);

      if($result5){
        echo "<div class='sucess_msg'>Payment Successful</div>";
      }
      unset($_SESSION["recbalance"]);
      $receiver ="";

    } else{
      echo "<div class='err_msg'>Not Sufficeint Balance</div>";
    }
  }





} else{

  echo "<div class='err_msg'>Unauthorize access !! You can not Access this page Directly</div>";
}
 ?>
