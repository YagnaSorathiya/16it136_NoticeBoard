		
		<?php
		
        $cdatedon="2017-04-20";
		$today_date=date('Y-m-d');
		
		$end_date=strtotime($cdatedon);
		$td=strtotime($today_date);
		
		if($td>$end_date){
			echo "<script>alert('expire!!!!!');</script>";
		}
	
		
		?>