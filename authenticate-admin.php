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
	$id = $_POST['adminid'];
    $pass = $_POST['password'];
    
	$query="SELECT * FROM `admin` WHERE `adminid`='$id' AND `password`='$pass'";
	$result=mysqli_query($con,$query);
	$rowcount=mysqli_num_rows($result);
	if($rowcount!=0)
		{	$_SESSION['adminid'] = $id;
			header('Location: ./admin-dashboard.php');
		}  	  
	else
	{
		header('Location:./admin-login.php?authentication=false');
	}
  
?>