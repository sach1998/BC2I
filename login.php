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

	$email = $_POST['username'];
    $pass = $_POST['password'];
    if($email == "admin@admin.com" && $pass = "admin" ){
		header('Location: ./index.html');
	}
    else if ($email == "a@technician.com" && $pass = "atech") {
		$_SESSION['tname']="a";
		header('Location: ./technician-table.php');
	}
	else if ($email == "b@technician.com" && $pass = "btech") {
		$_SESSION['tname']="b";
		header('Location: ./technician-table.php');
	}
	else if ($email == "c@technician.com" && $pass = "ctech") {
		$_SESSION['tname']="c";
		header('Location: ./technician-table.php');
	}
	else{
	$query="SELECT * FROM `user` WHERE `email`='$email' AND `password`='$pass'";
	$result=mysqli_query($con,$query);
	$rowcount=mysqli_num_rows($result);
	if($rowcount!=0)
		{	$_SESSION['email'] = $email;
			header('Location: ./complaint-form.php');
		}  	  
	else
	{
		// header('Location:./loading.html');
		// sleep(6);
		// echo "Wrong email or pasword.!";
		// sleep(5);
		// header('Location:./login.html');
		echo "false";
	}
}

  
?>