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

<body style="background-color: #343A40;">
<?php
      if(!isset($_SESSION['adminid'])) 
       {
           header("Location:login.php");  
       }
?>
    
  <div class="container" style="margin-top: 20px;">
  <img class="img-fluid z-depth-1 wow fadeInLeft mx-auto d-block" style="width:80px; height: 80px;  " src="assets/icons/logo-lg.png" alt="BC2I Logo" data-wow-delay="0.3s">
    <p class="h2 text-center" style="color: white;">Bureau of Cyber Crime Investigation (BC2I)</p><hr style="background-color:white;"><br>
    <p class="h4 text-center" style="color: white;">Complaint Details</p><br>
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
    
    <div class="form-row align-items-center">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>CID</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo $compid ?> disabled>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>UID</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo $usrid ?> disabled>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>Name</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo $row['name'] ?> disabled>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>Email</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo $row['email'] ?> disabled>
        <a href="mailto:<?php echo $row['email'];?>" class="btn btn-outline-light btn-sm">Send email</a>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>Phone</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo "+91".$row['phone'] ?> disabled>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>Date and Time of Complaint</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo $row1['doc']."&nbsp;&nbsp;".$row1['toc']; ?> disabled>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>Date and Time of Incident</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo $row1['doi']."&nbsp;&nbsp;".$row1['toi']; ?> disabled>
      </div>
     
      <div class="input-group mb-4">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>Type of Complaint</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo $row1['type'] ?> disabled>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>Subject</strong></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" value=<?php echo $row1['subject'] ?> disabled>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text"><strong>Written Complaint</strong></div>
        </div>
        <textarea class="form-control" id="inlineFormInputGroup" disabled> <?php echo $row1['complaint']; ?> </textarea>
      </div>

      <div>
          <span style="color: white;">Status: <?php if($row1['status_num']==1){?>
            <span class="h3 text-warning"><i>Pending</i></span>
          <?php }else if($row1['status_num']==2){?>
            <span class="h3 text-success"><i>Case Filed</i></span>
          <?php } ?>
        </span>
        &nbsp;&nbsp;
        <?php if($row1['status_num']==1){?>
        <a href="file-case.php?filecase=true&cid=<?php echo $compid;?>&uid=<?php echo $usrid; ?>" class="btn btn-info">File Case</a>
        <?php } ?>

        <br><br><a href="admin-dashboard.php" class="btn btn-outline-light"><i class="fa fa-arrow-left">&nbsp;Back</i></a>
    </div>

  </div>
    </div>
  <?php }?>
  </div>

<!-- End of Container -->
  </div>
  
  
 <div style="margin-top:100px;">

 </div>
          

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>