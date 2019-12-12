<?php
	session_start();
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

	if( mysqli_connect_errno() )
	{ 
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

    function create_cid($rand){
        $str_char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand_num = substr(str_shuffle($str_char),0,$rand);
        $tmp = date("Ymd").$rand_num;
        return $tmp;
    }

    if(isset($_POST['Submit'])){
    $email =  $_SESSION['email'];
    $sub = $_POST['subject']; //subject
    $doi = $_POST['date']; //date of incident
    $toi = $_POST['time']; //time of incident
    $type = $_POST['type']; //type of crime
    $comp = $_POST['complaint']; //written complaint
    date_default_timezone_set("Asia/Kolkata");
    $doc = date("d/m/Y"); //date of complaint
    $toc = date("h:i:sa"); //time of complaint
    // generating complant id
    $cid = create_cid(4); //complaint id
    // fetching uid
    $q = "SELECT `uid` FROM `user` where `email`= '$email'";
    $res = mysqli_query($con,$q); 
    $row = mysqli_fetch_assoc($res);
    $uid = $row['uid']; //taking uid
    echo $uid;

    //storing in database
    $query = "INSERT INTO `complaint` (`cid`,`uid`,`email`,`doc`,`toc`,`subject`,`doi`,`toi`,`type`,`complaint`,`status`) VALUES ('$cid','$uid','$email','$doc','$toc','$sub','$doi','$toi','$type','$comp','Pending')";
    mysqli_query($con,$query);

    $query2 = "UPDATE `user` SET `num_comp`=`num_comp`+1 WHERE `uid`= $uid";
    mysqli_query($con,$query2);

    // mysqli_query($con,"INSERT INTO `complaint`(`cid`,`uid`,`email`,`doc`,`toc`,`subject`,`doi`,`toi`,`type`,`complaint`,`status`) VALUES ('$cid','$uid','$email','$doc','$toc','$sub','$doi','$toi','$type','$comp',null)");
    
    $myfile = fopen($cid.".txt", "w") or die("Unable to open file!");
    fwrite($myfile, $comp);
    fclose($myfile);
    }
    header('Location:./user-index.php?registered=true');
    ?>