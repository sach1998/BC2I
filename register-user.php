<?php
	session_start();

	
	$myHost = "localhost";
	$myUserName = "root";
	$myPassword = "";
	$myDataBaseName = "bc2i"; 

	$con = mysqli_connect( "$myHost", "$myUserName", "$myPassword", "$myDataBaseName" );

	$error = mysqli_connect_error();
	 if($error != NULL){
		 echo 'Error';
		 die("connection object not created: ".$con->mysqli_connect);
	 }

	if( mysqli_connect_errno() )
	{ 
	    die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
	}

	$name = $_POST['name'];
	$email = $_POST['uemail'];
	
	$phone = $_POST['phone'];
    $pass = $_POST['password'];

	$sql="SELECT * FROM `user` WHERE `email`='$email'";
	$result=mysqli_query($con,$sql);
	$rowcount=mysqli_num_rows($result);
	if($rowcount!=0)
		{
			//Username already exists.
			header('Location: register.php?email=exists');
		}  	  
	else
	{
		$query="INSERT INTO `user` (`uid`,`name`,`email`,`phone`,`password`) VALUES (null,'$name','$email','$phone','$pass')";
		mysqli_query($con,$query);	
		header('Location: login.php?registered=true');
	}
	

  



?>