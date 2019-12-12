<?php   session_start();

$myHost = "localhost";
$myUserName = "root";
$myPassword = "";
$myDataBaseName = "bc2i"; 
$con = mysqli_connect("$myHost", "$myUserName", "$myPassword", "$myDataBaseName");
if( !$con )
{ 
    include("error.html");
    // die("Connection object not created: ".mysqli_error($con));
}
$username = $_SESSION['email'];
$query="SELECT * FROM `user` WHERE `email`= '$username'";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint | BC2I</title>

    <link rel="icon" href="assets/icons/bc2i-32.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/reg-complaint.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Google Icons
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <script src="assets/js/reg-complaint.js"></script>

</head>

<body>
<?php
      if(!isset($_SESSION['email'])) 
       {
           header("Location:login.php");  
       }
?>
    
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <img class="img-icon" src="assets/icons/bc2i-64.ico" alt="img-bc2i">&nbsp
              <a class="navbar-brand p-1" href="index.html">BC2I</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="user-index.php"><i class="fas fa-home"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-phone"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i></a>
                  </li>
                  <li>
                    <a class="nav-link" href="#"><i class="fa fa-user"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div>
          </div>
          </nav>