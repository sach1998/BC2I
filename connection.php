<?php

function Connect()
{
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
    else{
    return $con;
    }
}
?>