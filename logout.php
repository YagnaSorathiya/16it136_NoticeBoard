<?php
include_once 'g-config.php';
session_start();

//Unset token and user data from session
unset($_SESSION['access_token']);
unset($_SESSION['userData']);

//Reset OAuth access token
$gClient->revokeToken();
session_unset() ;
//Destroy entire session
session_destroy();

//Redirect to homepage
header("Location:index.php");

?>