<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="static/app.css">
    <link rel="stylesheet" href="static/index.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


    <title>Fedral Bank of Chicago</title>
  </head>
  <body>
        <header >
          <div class="page-header">
              <div class="head">
                <!-- <img src="" alt=""> -->
                  <h1>Welcome To Federal bAnk of cHicAGo</h1>
              </div>
              <div class="nav">
                <ul>
                  <li> <a  href="./index.php">Home</a> </li>
                  <li> <a  href="#au">ABOUT Us</a> </li>
                  <li> <a  href="#nb">ABOUT NET BANKING</a></li>
                  <li> <a  href="#cu">CONTACT US</a> </li>
                </ul>
              </div>
          </div>
       <div id="box-container">
           <a  href="user_login.php">USER LOGIN</a>
          <a  href="admin_login.php">ADMIN LOGIN</a>
       </div>
  </header>

<!-- about us section  -->
    <div id="au" class="au">
      <?php include "static/aboutus.inc"; ?>
    </div>
    <hr>
<!-- about next banking section -->
     <div id="nb" class="au">
       <?php include "static/net.inc"; ?>
     </div>
     <div id="cu" class="au">
       <?php include "static/footer.html"; ?>
     </div>

  </body>
</html>
