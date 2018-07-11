<?php
    include"static/header.html";
    $connection =mysqli_connect("localhost","root","","NetBanking");
    $receiver="";
    session_start();
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
    <div class='page-header'>
        <div class='head'>
          <h1>Transfer Money</h1>
        </div>
        <div class='nav'>
           <li> <a href='./user.php'>User Panel</a></li>
         </div>
      </div>

      <form class= action="" method="post">
            <table class="no-border">
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
      //insert into transaction table my own
      $insert1 ="INSERT INTO Transactions (Account_number,Amount,Type,Details) VALUES ('$myaccount',$amount,'Debit','$remarks')";
      $result1 =$connection->query($insert1);

      // insert recierve transcation ie credit
      $insert2 ="INSERT INTO Transactions (Account_number,Amount,Type,Details) VALUES ('$receiver',$amount,'Credit','$remarks')";
      $result2 =$connection->query($insert2);

      //updating own balance
      $mybalance =$mybalance-$amount;
      $update1 ="UPDATE Users SET Balance=$mybalance WHERE Account_number='$myaccount'";
      $result3 =$connection->query($update1);

      //updating reciever balance
      $recbalance =$recbalance+$amount;
      $update2 ="UPDATE Users SET Balance =$recbalance WHERE Account_number=$receiver";
      $result4 =$connection->query($update2);

      //inserting into
      $insert3 ="INSERT INTO Payment(Transfer_from ,Transfer_to ,Amount ,Remarks) VALUES ('$myaccount','$receiver',$amount,'$remarks')";
      $result5 =$connection->query($insert3);

      if($result5){
        echo "<div>Payment Successful</div>";
      }
      unset($_SESSION["recbalance"]);
      $receiver ="";

    } else{
      echo "<div class='err_msg'>Not Sufficeint Balance</div>";
    }
  }

 ?>
