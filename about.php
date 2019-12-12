<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icons/bc2i-32.png">
    <title>About | BC2I</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/about.css">

    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Martel+Sans&display=swap" rel="stylesheet">

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
                      <li class="nav-item active">
                        <a class="nav-link" href="#">About
                            <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <?php if(!isset($_SESSION['email'])){?>
                      <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                      </li>
                      <?php }?>
                      <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                      </li>
                      <?php if(isset($_SESSION['email'])){?>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">Logout</a>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
        </nav>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-lock"></i>&nbsp;Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to logout?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="logout.php" class="btn btn-primary">Yes, Logout</a>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
            <div class="row custom">
                <div class="col-md-12">
                    <div class="logo">
                        <img class="img-fluid z-depth-1 wow fadeInLeft img-logo" src="assets/icons/logo-lg.png" alt="BC2I Logo" data-wow-delay="0.3s">
                    </div>
                    <h2 class="org-name p-4">
                        Bureau of Cyber Crime Investigation
                    </h2>
                </div>
                <div class="col col-md-12">
                        <p class="text-justify content text-center">Bureau of Cyber Crime Investigation (BC2I) is a body working under the government to ensure the 
                        safety and security of the nation online.</p>
                </div>
            </div>
        </div>
        
        

    <script src="assets/js/about.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>