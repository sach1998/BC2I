<?php 
    if(isset($_GET['filecase'])){
      $compid = $_GET['cid']; 
      $usrid = $_GET['uid'];
    ?>
    <?php
    require 'connection.php';
    $conn = Connect();
    $query = "UPDATE `complaint` SET `status_num`=2, `status`='Case Filed' WHERE `uid` = '$usrid' AND `cid` = '$compid'";
    $res=mysqli_query($conn,$query);
    // $row1 = mysqli_fetch_assoc($res);

    // $query2 = "SELECT * FROM `user` WHERE `uid` = '$usrid'";
    // $result=mysqli_query($conn,$query2);
    // $row = mysqli_fetch_assoc($result);
    header('Location: admin-show-complaint.php?show=true&cid='.$compid.'&uid='.$usrid);
    }?>