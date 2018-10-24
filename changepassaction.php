<?php
include 'Config/DB.php';
$db = new DB();
$tblName = 'user_master';

session_start();
$uid = $_SESSION['user_id'];

if(isset($_POST['action_type']) && !empty($_POST['action_type']))
{
    
		if($_POST['action_type'] == 'edit')
	{
        if(!empty($uid))
		{
			
			$conditions['select'] = 'password';
			$conditions['where'] = array('uid'=>$uid);
			$conditions['return_type'] = 'single';
			$pass = $db->getRows($tblName,$conditions);
			
			if($pass['password'] == $_POST['password'])
			{
				echo 'same';
			}
			else
			{
				if($_POST['password'] == $_POST['confirm'])
				{
					$userData = array
					(
						'password' => $_POST['password'],
					);
				
					$condition = array('uid' => $uid);
					$update = $db->update($tblName,$userData,$condition);
					echo $update?'ok':'err';
				}
				else{
						echo 'dontmatch';
					}
			}
		
		}
    }
  
}
		
	exit;
 
?>



