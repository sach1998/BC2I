<!-- Sach Code -->
<!-- index page | Landing page -->
<?php   session_start();
if(!isset($_SESSION['email'])){
  header("Location:index.php");
}

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

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/icons/bc2i-32.png">

  <title>Home | BC2I</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <!-- Custom CSS -->
  <link href="assets/css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/user-index.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">

  <!-- Font Awesome icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <!-- AngularJS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  
</head>

<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <img class="img-icon" src="assets/icons/bc2i-64.ico" alt="img-bc2i">&nbsp
      <a style="font-family: 'Play', sans-serif;" class="navbar-brand p-1" href="#">BC2I</a>
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
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn" href="#" id="navbardrop" data-toggle="dropdown">
             <span class="fa fa-user pull-right"></span>
            </a>
            <div style="background-color: #343A40" class="dropdown-menu">
              <a style="color: white;font-size:20px;" class="dropdown-item" id="drpdwn" href="#"><?php echo $row['name'];?></a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" href="reg-complaint.php"><i class="fas fa-edit"></i>&nbsp;Register a Complaint</a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" href="previous-complaints.php"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;Previous Complaints</a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-sign-out-alt"></i>&nbsp;Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Modal Content -->
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

  <!-- Header -->
  <header class="bg-primary custom-header py-5 mb-5">
    <div class="container h-100">
    <?php if(isset($_GET['msg'])){
    ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
  <center>Message has been sent</center>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <?php } ?>
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
        <h2>User Menu</h2>
        <hr>
        <br>
        <a class="btn btn-primary btn-lg m-1" href="reg-complaint.php">Register a Compliant &nbsp;<i class="fas fa-edit"></i></a>
        <br>
        <a class="btn btn-primary btn-lg m-1" href="user-dashboard.php">Registered Complaints &nbsp;<i class="fas fa-file-alt"></i></a>
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
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; BC2I 2019</p>
      <p class="text-center text-white">Bureau of Cyber Crime Investigation</p>
      <div class="row">
      <div class="col-md-4">
          <p class="h5" style="color:white;">Contact BC2I</p><hr style="background-color: white;">
          <address style="color:white">
          <strong>BC2I Help Center</strong>
          <br>3481 Near PQR circle
          <br>ABC Hills, XYZ 784576
          <br>
        </address>
        <address style="color:white">
          <abbr title="Phone">P:</abbr>
          (+91) 9985399853
          <br>
          <abbr title="Email">E:</abbr>
          <a href="contact@bc2i.com">contact@bc2i.com</a>
        </address>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <div class="h5 text-light text-right mt-2 time" ng-app="bc2iApp" ng-controller="bc2iCtrl">
      <h6>{{theTime}} | Site visits: <?php print $visits; ?> </h6> 
      </div>
      </div>
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
