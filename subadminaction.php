<?php
include 'Config/DB.php';
$db = new DB();
$tblName = 'user_master';

if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'add'){
	
				
            $userData = array(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'email' => $_POST['email'],
			'contact_no' => $_POST['contact_no'],
			'address' => $_POST['address'],
			'city' => $_POST['city'],								
		    'role' => 'subadmin',				
			'status' => $_POST['status']
            );
            $insert = $db->insert($tblName,$userData);
            echo $insert?'ok':'err';

					
		
    }
	elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['uid'])){
			
			$userData = array(
			
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'email' => $_POST['email'],
			'contact_no' => $_POST['contact_no'],
			'address' => $_POST['address'],
			'city' => $_POST['city'],								
		    'role' => 'subadmin',				
			'status' => $_POST['status']
            );
			
			 $condition = array('uid' => $_POST['uid']);
            $update = $db->update($tblName,$userData,$condition);
            echo $update?'ok':'err';
			
			
		}
		
    
		}
			
   
	elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['uid'])){
			
			//DELETE DATA FROM DATABASE
			$condition = array('uid' => $_POST['uid']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
			
        }
	}
		elseif($_POST['action_type'] == 'data')
	 {
		
        $conditions['where'] = array('uid'=>$_POST['uid']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
	 }
	 
	 
	 
	 
	 
	  else if($_POST['action_type'] == 'validateusername')
	 {
		$conditions['select'] = 'username,role';
		$conditions['where'] = array('username'=>$_POST['username'],'role' => 'subadmin');
        $user = $db->getRows("user_master",$conditions);
		
		echo $user?'err':'ok';
	 }
	 
	   elseif($_POST['action_type'] == 'validateusernameEdit')
	 {
		 $uid = $_POST['uid'];
		 $username = $_POST['username'];
        $user = $db->selectQuery("select uid from user_master where username='$username' and role='subadmin' and uid !=".$uid);
		
		echo $user[0]['uid']?'err':'ok';
		
	 }
	 
	 
	 elseif($_POST['action_type'] == 'validateemail')
	 {
		$conditions['select'] = 'email';
		$conditions['where'] = array('email'=>$_POST['email']);
        //$conditions['return_type'] = 'single';
        $user = $db->getRows("user_master",$conditions);
		
		echo $user?'err':'ok';
		
	 }
	 
	 	 elseif($_POST['action_type'] == 'validateemailEdit')
	 {
		 
		 $uid = $_POST['uid'];
		 $email = $_POST['email'];
        $user = $db->selectQuery("select uid from user_master where email='$email' and role='subadmin' and uid !=".$uid);
		
		echo $user[0]['uid']?'err':'ok';
		
		
		
	 }
	 
	 elseif($_POST['action_type'] == 'getPass')
	 {
		$length = 8;
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		if($length < 8)
		{
			alert("password should be minimum 8 characters long.");
		}
		$password = substr( str_shuffle( $chars ), 0, $length );
		echo $password;
	 }	
	 
	 
 }	 
    
    exit;
 
?>



