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
    <link rel="icon" href="assets/icons/bc2i-32.png">
    <title>User Dashboard | BC2I</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/user-dashboard.css">

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
      <a style="font-family: 'Play', sans-serif;" class="navbar-brand p-1" href="#">BC2I</a>
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
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn" href="#" id="navbardrop" data-toggle="dropdown">
             <span class="fa fa-user pull-right"></span>
            </a>
            <div style="background-color: #343A40" class="dropdown-menu">
              <a style="color: white;font-size:20px;" class="dropdown-item" id="drpdwn" href="#"><?php echo $row['name'];?></a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" href="reg-complaint.php"><i class="fas fa-edit"></i>&nbsp;Register a Complaint</a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" href="#"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;Previous Complaints</a>
              <a style="color: white;" class="dropdown-item" id="drpdwn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-sign-out-alt"></i>&nbsp;Logout</a>
            </div>
          </li>
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
  <div class="regcomplaints" style="margin-top: 100px;">
       <h3>Registered Complaints</h3>
       <hr>
  </div> 
  <div class="row" style="margin-top: 20px;">
  <?php
    require 'connection.php';
    $conn = Connect();
    $num_comp = '';
    $sqlforuid = "SELECT `uid` FROM `user` WHERE `email`= '$username'";
    $res=mysqli_query($conn,$query);
    $row1 = mysqli_fetch_assoc($res);
    $fetchuid = $row1["uid"];
    $query = "SELECT * FROM `complaint` WHERE `uid` = '$fetchuid'";
    $result=mysqli_query($conn,$query);
    if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)){
     $num_comp = $row1['num_comp'];
  ?>
    <div class="col-sm-6">
    <div class="card" style="margin:10px;">
      <div class="card-header">Complaint ID:<strong>
      <?php echo $row["cid"]; ?></strong>
         </div>
      <div class="card-body">
        <h5 class="card-title"><?php echo $row["subject"]; ?></h5>
        <p class="card-text"><?php echo substr($row["complaint"],0,40); ?>...</p>
        <a href="show-complaint.php?show=true&uid=<?php echo $fetchuid ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-primary">Show Details</a>
      </div>
    </div>
  </div>
<?php
    }
  }
?>

<!-- End of Container -->
</div>
<?php if($num_comp==0){?>
  <p class="h4 text-center" style="color: #c0c5cd; margin-top: 200px;">No complaints to show!</p>
  <?php } ?>
</div>          
          

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>