<?php
session_start();
$user = $_SESSION['email'];
session_destroy();
session_unset();
header('Location: index.php?user='.$user.'&loggedout=true'); 
?>