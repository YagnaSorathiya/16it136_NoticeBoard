<?php
include 'Config\DB.php';

$db = new DB();
$tblName = 'notice';

session_start();
$uid = $_SESSION['user_id'];
$un=$_SESSION['username'];

/* 
ini_set('max_execution_time', 3000);
ini_set('max_input_time', 3000);
ini_set('upload_max_filesize','500M'); */


if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
		
    if($_POST['action_type'] == 'add'){
		
		//if(!empty($_FILES["doctype"]["name"])){
		
			date_default_timezone_set('Asia/Kolkata');
			
		if(!empty($_POST['end_date']) ){
		
			$cdate= explode("/",$_POST['end_date']);
			$cdatedon=$cdate[2]."-".$cdate[1]."-".$cdate[0];
		}else{
			$cdatedon =date('Y-m-d', time());
		}
			
			$upload_date = date('Y-m-d', time()); 	
			
					
			$folder = "documents/";
			    
				$new_name = $folder.$_POST["docname"];
				move_uploaded_file($_FILES["doctype"]["tmp_name"], $new_name);
				$out_doc=addslashes($new_name);
							
			$userData = array(
			
				'uid' =>$uid,
				'notice_creator' =>$un,
				'Title' => $_POST['Title'],
				'category' => $_POST['category'],
				'end_date' =>$cdatedon,
				'content' => $_POST['content'],
				'docname' => $_POST['docname'],
				'docpath' => $new_name,
				'upload_date'=> $upload_date
				
				);	
				
				$insert = $db->insert($tblName,$userData);
				  echo $insert?'ok':'err1'; 
			
			
				// $conditions['select'] = "document_status";
				// $conditions['where'] = array('jid'=>$_POST['jid']);
				// $conditions['return_type'] = 'single';
				// $stat = $db->getRows("jobmaster",$conditions);
				
				// $status= 'ok';
				// if($stat['document_status'] != 'Uploaded'){
				// $userData = array(
						// 'document_status' => 'Uploaded'
						// );
				// $condition = array('jid' => $_POST['jid']);
				// $update = $db->update("jobmaster",$userData,$condition);
				// $status= $update?'ok':'err';
				// }
				
				// echo $status;
				// echo $insert?'ok':'err';
		
			
				
		
		
	
}
	elseif($_POST['action_type'] == 'edit'){
      
		
		
		$cdate= explode("/",$_POST['end_date']);
        $cdatedon=$cdate[2]."-".$cdate[1]."-".$cdate[0];
		
	
		
		$folder = "documents/";
			    
				$new_name = $folder.$_POST["docname"];
				move_uploaded_file($_FILES["doctype"]["tmp_name"], $new_name);
				$out_doc=addslashes($new_name);
				
	  if(!empty($_POST['id'])){
		 $userData = array(
			
			'end_date' =>$cdatedon,
			'Title' => $_POST['Title'],
			'category' => $_POST['category'],
			'docname' => $_POST['docname'],
			'docpath' => $new_name,
			'content' => $_POST['content']
		);
			
			$condition = array('id' => $_POST['id']);
            $update = $db->update($tblName,$userData,$condition);
            echo $update?'ok':'err';
	  }
			
	 }
	else if($_POST['action_type'] == 'delete'){
        if(!empty($_POST['id'])){
		
		$conditions['select'] = "docpath";
		$conditions['where'] = array('id'=>$_POST['id']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName,$conditions);
        
			$file = $user['docpath'];
			unlink($file);
			
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
	 
	 	elseif($_POST['action_type'] == 'view')
	{
		 
       
        $docs = $db->selectQuery("select id,docname,docpath,upload_date from notice where id=".$_POST['id']);
		 
		 if(!empty($docs))
		 {
            $count = 0;
            foreach($docs as $doc): $count++;
                echo '<tr>';
				echo '<th>'.$count.'. '.$doc['docname'].' :	</th>';
                echo '<td><a href="'.$doc['docpath'].'" id="bill_path_in" target="_blank"><button type="button" class="btn btn-default btn-md"><i class="fa fa-cloud-download"></i> Download</button></a><div style="margin-left:10px" onclick="confirm(\'Are you sure to delete this document?\')?vaction(\'delete\','.$doc['id'].'):false;vaction(\'view\','.$_POST['id'].');" class="btn bg-blue btn-sm"> Delete <i class="fa fa-close" style="blue"></i></div></td>';
				echo '</tr>';
				endforeach;
        }
		else
		{
            echo '<tr><td colspan="6">No Document(s) found......</td></tr>';
        }
    }
	

    exit;

}	
?>



