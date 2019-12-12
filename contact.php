<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/bc2i-64.ico">

    <title>Contact | BC2I</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link href="assets/css/contact.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alatsi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">


  </head>
  <body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
              <img class="img-icon" src="assets/icons/bc2i-64.ico" alt="img-bc2i">&nbsp
              <a style="font-family: 'Play', sans-serif;" class="navbar-brand p-1" href="index.php">BC2I</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Contact <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
<body>
<div class="container contact-form">
            <div class="contact-image">
                <img style="width: 100px; breadth: 100px;" src="assets/icons/logo-lg.png" alt="bc2i_icon"/><br><br>
                <span class="h5 bc2i-text">Bureau of Cyber Crime Investigation</span>
            </div>
            <form method="post" action="index.php?msg=sent">
                <h3>Drop a message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" onclick="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                    <?php if(!isset($_SESSION['email'])){?>
                    <center><span class="h6 text-center">You can login to your BC2I account from <a class="h5" style="text-decoration:none" href="login.php">HERE</a></span></center>
                    <?php }  ?>
                    </div>
                
            </form>
</div>

</body>
</html>