<?php
	require_once "g-config.php";
	include 'Config\GUserDB.php';
	 include 'Config\config.php';
	 
	if (isset($_SESSION['access_token'])){
		$gClient->setAccessToken($_SESSION['access_token']);
	}
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$user = new User();
	 
	//Insert or update user data to the database
if(isset($_SESSION['access_token']) ){
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $userData['id'],
        'first_name'    => $userData['given_name'],
        'last_name'     => $userData['family_name'],
        'email'         => $userData['email'],
        'gender'        => $userData['gender'],
        'locale'        => $userData['locale'],
        'picture'       => $userData['picture'],
        'link'          => $userData['link']
    );
    $userData = $user->checkUser($gpUserData);
	// header('Location:dashboard.php');
	echo "<h1>Your account is waiting for approval!</h1>";
	
}
	
	exit();
?>