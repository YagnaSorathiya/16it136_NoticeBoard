<?php
require_once "g-config.php";

	/* if (isset($_SESSION['access_token'])) {
		header('Location: dashboard.php');
		exit();
	}
 */
	$loginURL = $gClient->createAuthUrl();
	
	
?>

<?php
ob_start();
   
   $error='';
   if(isset($_POST['submit'])){
    
      // username and password sent from form 
     include 'Config\config.php';
     include 'Config\DB.php';
	 
	 $db = new DB();
   	  $username = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM user_master WHERE email = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $role = $row['role'];
	  $uid = $row['uid'];
	  $usertitle = $row['username'];
	  $status = $row['status'];
      
	  $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         //session_register("myusername");
        
		 
		 if($role == 'admin')
		 {
			 $_SESSION['login_user'] = $username;
			 $_SESSION['user_role'] = $role;
			 $_SESSION['user_id'] = $uid;
			 $_SESSION['username'] = $usertitle;
			 header("location: dashboard.php");
		 }
		
		 if($role == 'subadmin')
		 {
			if($status == 'Active')
			{ 
				$_SESSION['login_user'] = $username;
				$_SESSION['user_role'] = $role;
				$_SESSION['user_id'] = $uid;
				$_SESSION['username'] = $usertitle;
				header("location: dashboard.php");
			}
			else if($status == 'Deactive')
			{
				$error = "Can't Login, Your account is deactivated!";
			}
		 }
		 if($role == 'subadmin')
		 {
         header("location: dashboard.php");
		 }
		 
      }
	  else 
	  {
         $error = "Your Email or Password is invalid. Please try again.";
      }
		
   
   }
 ?>
<head>
  <title>NoticeBoard</title>
	<meta charset="UTF-8">
	 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="LoginF/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginF/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginF/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginF/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginF/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="LoginF/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginF/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginF/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="LoginF/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginF/css/util.css">
	<link rel="stylesheet" type="text/css" href="LoginF/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div class="limiter">
		<div class="container-login100" style="background-image: url('LoginF/images/c3.jpg');">
		
			<div class="wrap-login100">
				<form  class="login100-form validate-form" action="" method="post">
					<div class="login100-form-logo" style="background-image: url('LoginF/images/logo.png');" >
						
					</div>

					<h4 class="login100-form-title p-b-10 p-t-12">
						NoticeBoard
					</h4>

					<div class="wrap-input100 validate-input" data-validate="Enter email">
						 <input type="email" class="input100" placeholder="Email" id="email" name="email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						 <input type="password" class="input100" placeholder="Password" id="password" name="password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" style="color:black;" name="submit" id="submit" >Login</button>
					</div>
					<br>
					<h5 style="margin-left:47%;color:white;">Or</h5>
					<br>	
						<div style="margin-left:25%;">
					   <button type="button" style="width:200px; float:left; " onclick="window.location = '<?php echo $loginURL ?>';" style="color:black;" class="btn btn-danger"> <i class="fa fa-google" aria-hidden="true"></i>
					   Login With Google
					  </button>
					  <br>	
					  <br>	
					   </div>
					   <div class="col-xs-12"  style="color:red;text-align:center;margin-top:5px;margin-bottom:0px;">
							<div class="checkbox icheck">
						<label class="text-red">
						<?php echo $error; ?>
						</label>
						</div>
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
     
   
<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="LoginF/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="LoginF/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="LoginF/vendor/bootstrap/js/popper.js"></script>
	<script src="LoginF/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="LoginF/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="LoginF/vendor/daterangepicker/moment.min.js"></script>
	<script src="LoginF/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="LoginF/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="LoginF/js/main.js"></script>
	<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</script>
</body>
</html>
