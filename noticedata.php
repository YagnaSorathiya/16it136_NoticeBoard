<?php
 include 'Config/config.php';
 
 session_start();
 $uid = $_SESSION['user_id'];

 
$resultset = mysqli_query($conn,"SELECT id,notice_creator,end_date,content,category,Title,docname,docpath,upload_date
FROM  notice where uid=$uid");

$data = array();
$udt='';
$vdt='';
$cdt='';
$cd='';
$count=0;	

			while( $rows = mysqli_fetch_assoc($resultset) )
			{
				if(!empty($rows["upload_date"]))
			{
				$cpart= explode('-', $rows['upload_date']);
				$udt =$cpart[2]."-".$cpart[1]."-".$cpart[0];
				$rows["upload_date"] = $udt;
			}
			
			if(!empty($rows['end_date'])){
				$ct= explode("-", $rows['end_date']);
				$cd =$ct[2]."-".$ct[1]."-".$ct[0];
				$rows['end_date'] = $cd;
			}
			$data[] = $rows;
			}

$results = array(
"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
"data" => $data
);
echo json_encode($results);
?>



