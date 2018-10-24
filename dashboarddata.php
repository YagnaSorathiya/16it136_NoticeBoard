<?php
 include 'Config/config.php';
 date_default_timezone_set('Asia/Kolkata');
 
 
$toDate = date('Y/m/d',strtotime("+10 Days"));
$fromDate = date('Y/m/d',time());
 
$resultset = mysqli_query($conn,"SELECT i.id,c.company,c.contact_person,p.product_name,c.mob,c.email,c.gst_no,i.expiry_date FROM issue_entry i
LEFT JOIN client_master c ON i.company = c.id
LEFT JOIN product_master p ON i.product_name = p.id
where (expiry_date <='$toDate' and expiry_date >='$fromDate')");
$data = array();
$cdt='';
$count=0;

			while( $rows = mysqli_fetch_assoc($resultset) )
		{
			
			if(!empty($rows["expiry_date"]))
			{
			$cpart= explode('-', $rows['expiry_date']);
			$cdt =$cpart[2]."-".$cpart[1]."-".$cpart[0];
			$rows["expiry_date"] = $cdt;
			}
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



