<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("985057179774-4tdlsc9oqdrnafrpbvr63tmil1908toe.apps.googleusercontent.com");
	$gClient->setClientSecret("xv-Sn_xof28faxpA44cVF8q_");
	$gClient->setApplicationName("NoticeBoard");
	$gClient->setRedirectUri("http://localhost/NoticeBoard/g-callback");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
