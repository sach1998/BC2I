<?php   session_start();
if(!isset($_SESSION['adminid'])){
  header("Location:index.php");
}?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/bc2i-64.ico">

    <title>Admin | BC2I</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <!-- <link href="assets/css/login.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/css/admin-dashboard.css">

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    
  </head>
  <body>
          <?php
          require 'connection.php';
          $conn = Connect();
          $sql = "SELECT COUNT(*) FROM `user`";
          $sql2 = "SELECT COUNT(*) FROM `complaint` WHERE `status_num`=1";
          $sql3 = "SELECT COUNT(*) FROM `complaint` WHERE `status_num`=2";
          $cnt=mysqli_query($conn,$sql);
          $cnt2=mysqli_query($conn,$sql2);
          $cnt3=mysqli_query($conn,$sql3);
          $rw = mysqli_fetch_assoc($cnt);
          $rw2 = mysqli_fetch_assoc($cnt2);
          $rw3 = mysqli_fetch_assoc($cnt3);
          $usrcnt = $rw['COUNT(*)'];
          $regcomp = $rw2['COUNT(*)'];
          $fldcomp = $rw3['COUNT(*)'];
          ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
              <img class="img-icon" src="assets/icons/bc2i-64.ico" alt="img-bc2i">&nbsp
              <a class="navbar-brand p-1" href="index.php">BC2I</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout-admin.php"><i class="fas fa-sign-out-alt"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-counter primary">
                <i class="fa fa-users"></i>
                <span class="count-numbers"><?php echo $usrcnt;?></span>
                <span class="count-name">Number of Users</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-counter danger">
                <i class="fa fa-file-alt"></i>
                <span class="count-numbers"><?php echo $regcomp;?></span>
                <span class="count-name">Registered Complaints</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-counter success">
                <i class="fa fa-check"></i>
                <span class="count-numbers"><?php echo $fldcomp;?></span>
                <span class="count-name">Filed Complaints</span>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>

        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">CID</th>
                <th scope="col">UID</th>
                <th scope="col">Email</th>
                <th scope="col">DoC</th>
                <th scope="col">ToC</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <?php
                $id = 1;
                $query = "SELECT * FROM `complaint`";
                $result=mysqli_query($conn,$query);
                if ($result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    
                    $uid = $row['uid'];
                    $sqlforuid = "SELECT * FROM `user` WHERE `uid`= '$uid'";
                    $res=mysqli_query($conn,$query);
                    $rowusr = mysqli_fetch_assoc($res);
            ?>
            <tbody>
              <tr>
                <th scope="row"><?php echo $id ?></th>
                <td><?php echo $row['cid'];?></td>
                <td><?php echo $row['uid'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['doc'];?></td>
                <td><?php echo $row['toc'];?></td>
                <td><?php echo $row['type'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><a href="admin-show-complaint.php?show=true&cid=<?php echo $row['cid'];?>&uid=<?php echo $row['uid'];?>" class="btn btn-primary">Show</a></td>
              </tr>
            </tbody>
                <?php $id+=1; } }  ?>
        </table>

    </div>