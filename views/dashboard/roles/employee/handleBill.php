<?php 
	
	if(isset($_REQUEST['submit']))
	{
		$price = $_REQUEST['total_price'];
		if($price == ""){
			echo "null value...";
		}else{
			echo $price;
		}	
	}else{
		echo "invalid request...";
	}
	
?>