<?php
include 'Config/DB.php';
$db = new DB();
$tblName = 'category';

session_start();
$uid = $_SESSION['user_id'];

if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'add'){
			

            $userData = array(
			
			'uid' =>$uid,
			'category_name' => $_POST['category_name']
            
			);
            $insert = $db->insert($tblName,$userData);
            echo $insert?'ok':'err1';
		}
		
					
		
    elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['id'])){
			
	
           $userData = array(
		
			'category_name' => $_POST['category_name'],
		
			);
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName,$userData,$condition);
            echo $update?'ok':'err';
		}
			
    }elseif($_POST['action_type'] == 'delete'){
        if(!empty($_POST['id'])){
            $condition = array('id' => $_POST['id']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
	}
	elseif($_POST['action_type'] == 'data')
	 {
		
        $conditions['where'] = array('id'=>$_POST['id']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
	 }
}
	 
	 /*  
	  elseif($_POST['action_type'] == 'validateusername')
	 {
		$conditions['select'] = 'username';
		$conditions['where'] = array('username'=>$_POST['username']);
        //$conditions['return_type'] = 'single';
        $user = $db->getRows("usermaster",$conditions);
		
		echo $user?'err':'ok';
		
	 }
	 
	 elseif($_POST['action_type'] == 'validateemail')
	 {
		$conditions['select'] = 'email';
		$conditions['where'] = array('email'=>$_POST['email']);
        //$conditions['return_type'] = 'single';
        $user = $db->getRows("usermaster",$conditions);
		
		echo $user?'err':'ok';
		
	 }
	 
	 
	  */
	 
   
    exit;
 
?>



