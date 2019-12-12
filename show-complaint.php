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
    <title>User Dashboard | BC2I</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <link rel="stylesheet" href="assets/css/user-dashboard.css">

</head>

<body>
<?php
      if(!isset($_SESSION['email'])) 
       {
           header("Location:login.php");  
       }
?>
    
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <img class="img-icon" src="assets/icons/bc2i-64.ico" alt="img-bc2i">&nbsp
      <a class="navbar-brand p-1" href="#">BC2I</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="user-index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn" href="#" id="navbardrop" data-toggle="dropdown">
             <span class="fa fa-user pull-right"></span>
            </a>
            <div style="background-color: #343A40" class="dropdown-menu">
              <a style="color: white;font-size:20px;" class="dropdown-item" id="drpdwn" href="#"><?php echo $row['name'];?></a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" href="reg-complaint.php"><i class="fas fa-edit"></i>&nbsp;Register a Complaint</a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" href="previous-complaints.php"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;Previous Complaints</a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" href="logout.php"><i class="fa fa-sign-out-alt"></i>&nbsp;Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
  <div class="container" style="margin-top: 100px;">
  <div id="print">
  <?php if(isset($_GET['show'])){
      $compid = $_GET['cid']; 
      $usrid = $_GET['uid'];
    ?>
    <?php
    require 'connection.php';
    $conn = Connect();
    $query1 = "SELECT * FROM `complaint` WHERE `uid` = '$usrid' AND `cid` = '$compid'";
    $res=mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_assoc($res);

    $query2 = "SELECT * FROM `user` WHERE `uid` = '$usrid'";
    $result=mysqli_query($conn,$query2);
    $row = mysqli_fetch_assoc($result);
  ?>
    <div class="col">
        <div class="card border border-primary" style="padding:20px;">
        <img class="img-fluid z-depth-1 wow fadeInLeft img-logo mx-auto" style="width:80px; height: 80px;  " src="assets/icons/logo-lg.png" alt="BC2I Logo" data-wow-delay="0.3s">
            <p class="h2 mx-auto">Bureau of Cyber Crime Investigation (BC2I)</p><hr>
            <p class="h4">Complaint ID: <strong><?php echo $compid;?></strong></p>
            <p class="h6">Plaintiff Name: <?php echo $row['name'] ?></p>
            <p class="h6">Date & Time of Complaint: <?php echo $row1['doc']."  ".$row1['toc'] ?></p>
            <p class="h6">Date and time of Incident: <?php echo $row1['doi']."  ".$row1['toi'] ?></p>
            <p class="h6">Type of Complaint: <?php echo $row1['type']?></p>
            <p class="h6">Subject:</p> <p><?php echo $row1['subject'] ?></p>
            <p class="h6">Written Complaint:</p> <p><?php echo $row1['complaint'] ?></p>
            <hr>
            <?php if($row1['status_num']==1){ ?>
            <p class="h5">Status: <span class="text-secondary"><?php echo $row1['status'];?></span></p>
            <?php }else if($row1['status_num']==2){?>
            <p class="h5">Status: <span class="text-success"><?php echo $row1['status'];}?></span></p>
        </div>
    </div>
  <?php }?>
  
  </div>

  <div class="mx-auto">
  <input type="button" class="btn btn-outline-primary" style="margin: 20px; align-text:center" onclick="printDiv('print')" value="Print" />
  </div>
<!-- End of Container -->
  </div>
  
  
  <script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>        
          

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>