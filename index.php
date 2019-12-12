<!-- Sach Code -->
<!-- index page | Landing page -->
<?php session_start();
if(isset($_SESSION['email'])){
  header("Location:user-index.php");
} else if(isset($_SESSION['adminid'])){
  header("Location:admin-dashboard.php");
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/icons/bc2i-32.png">

  <title>Home | BC2I</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="assets/css/index.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <!-- AngularJS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>

<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top">
    <div class="container">
      <img class="img-icon" src="assets/icons/bc2i-64.ico" alt="img-bc2i">&nbsp
      <a style="color: white;font-family: 'Play', sans-serif;" class="navbar-brand p-1" href="index.php">BC2I</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-login.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-primary py-4 mb-5">
  <?php if(isset($_GET['loggedout'])){
    ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
  <center><?php echo $_GET['user']." ";?>successfully logged out</center>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <?php } ?>
  <?php if(isset($_GET['msg'])){
    ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
  <center>Message has been sent</center>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <?php } ?>
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Bureau of Cyber Crime Investigation</h1>
          <p class="lead mb-5 text-white-50">This portal is designed to facilitate victims of cyber crime to register complaint online and helping to make the Nation the safest place to live and work.</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
  
    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>Stay Safe Online</h2>
        <hr>
        <p style="text-align:justify">Cybercrime, or computer-oriented crime, is a crime that involves a computer and a network. The computer may have been used in the commission of a crime, or it may be the target. Cybercrimes can be defined as: "Offences that are committed against individuals or groups of individuals with a criminal motive to intentionally harm the reputation of the victim or cause physical or mental harm, or loss, to the victim directly or indirectly, using modern telecommunication networks such as Internet (networks including chat rooms, emails, notice boards and groups) and mobile phones (Bluetooth/SMS/MMS)". Cybercrime may threaten a person or a nation's security and financial health. Issues surrounding these types of crimes have become high-profile, particularly those surrounding hacking, copyright infringement, unwarranted mass-surveillance, sextortion, child pornography, and child grooming.</p>
        <p></p>
        <a class="btn btn-primary btn-lg" href="about.php">About Us &raquo;</a>
      </div>
      <div class="col-md-4 mb-5">
        <h2>Do you need help?</h2>
        <hr>
        <address>
          <strong>BC2I Help Center</strong>
          <br>3481 Near PQR circle
          <br>ABC Hills, XYZ 784576
          <br>
        </address>
        <address>
          <abbr title="Phone">P:</abbr>
          (+91) 9985399853
          <br>
          <abbr title="Email">E:</abbr>
          <a href="contact@bc2i.com">contact@bc2i.com</a>
        </address>
        <hr>
      <a href="login.php" class="btn btn-primary btn-lg">BC2I Account Login &nbsp;<i class="fa fa-sign-in-alt"></i></a>
      </div>
    </div>
    
    <h3>The Three Pillars of Cyber Security</h3>
    <hr>
    <div class="row row-card">
      <div class="col-md-4 mb-5">
        <div class="card h-100 card-custom">
          <img class="card-img-top card-img-custom" src="https://image.freepik.com/free-vector/communication-flat-icon_1262-18771.jpg" alt="img-people">
          <div class="card-body">
            <h4 class="card-title">People</h4>
            <p class="card-text">Every employee needs to be aware of their role in preventing cyber threats. Cyber security staff need to stay up to date with the latest risks, solutions and qualifications.</p>
          </div>
          
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100 card-custom">
          <img class="card-img-top card-img-custom" src="https://www.datocms-assets.com/4351/1521072097-business-process-automation.png" alt="img-process">
          <div class="card-body">
            <h4 class="card-title">Process</h4>
            <p class="card-text">Documented processes should clearly define roles, responsibilities and procedures. Cyber threats are constantly evolving, so processes need to be regularly reviewed.</p>
          </div>
          
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100 card-custom">
          <img class="card-img-top card-img-custom" src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="img-technology">
          <div class="card-body">
            <h4 class="card-title">Technology</h4>
            <p class="card-text">From access controls to installing antivirus software, technology can be utilised to reduce cyber risks.</p>
          </div>
          
        </div>
      </div>
    </div>
    <!-- end of row - card -->
    
    

  </div>
  <!-- end of body container -->

  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bc2i";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "UPDATE counter SET visits = visits+1 WHERE id = 1";
    $conn->query($sql);

    $sql = "SELECT visits FROM counter WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "no results";
    }
    
    $conn->close();
?>

  <!-- Footer -->
  <footer class="p-3 bg-dark">
    <div class="container">
      <p class="h6 m-0 text-center text-white">Copyright &copy; BC2I 2019</p><br>
      <p class="text-center text-white">Bureau of Cyber Crime Investigation</p>
      <div class="h5 text-light text-right mt-2 time" ng-app="bc2iApp" ng-controller="bc2iCtrl">
      <h6>{{theTime}} | Site visits: <?php print $visits; ?> </h6> 
      </div>
    </div>
    <!-- end of Footer container -->
  </footer>

<!-- Scripts are placed at the bottom -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
var app = angular.module('bc2iApp', []);
app.controller('bc2iCtrl', function($scope, $interval) {
  $scope.theTime = new Date().toLocaleTimeString();
  $interval(function () {
      $scope.theTime = new Date().toLocaleTimeString();
  }, 1000);
});
</script>
</body>

</html>
