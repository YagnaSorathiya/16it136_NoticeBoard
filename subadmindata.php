<?php
 include 'Config/config.php';
 
$resultset = mysqli_query($conn,"SELECT uid,username,email,contact_no,address,city,role,status FROM user_master where role='subadmin'");
$data = array();
$ct='';
$count=0;
			while( $rows = mysqli_fetch_assoc($resultset) ) {	
			$count = $count+1;
			$rows['count'] = $count;
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