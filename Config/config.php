	   <?php

		$host    = "localhost"; // Host name
		$db_name = "noticeboard";		// Database name
		$db_user = "root";		// Database user name
		$db_pass = "";			// Database Password
		
		 $conn =mysqli_connect($host,$db_user,$db_pass,$db_name)or die(mysqli_error());
		//mysqli_select_db($db_name,$conn)or die(mysqli_error());
	   
?>