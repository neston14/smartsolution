<?php
	
	function convertTo2Digit($temp){
		if($temp<10){
			$return_text="0".$temp;
		}else if($temp>=10){
			$return_text=$temp;
		}
		return $return_text;

	}
	function convertToThaiYear($temp){
		if($temp<2500){
			$return_text=$temp+543;
		}else{
			$return_text=$temp;
		}
		return $return_text;
	}
	function monthToText($temp){
		switch($temp) { 
			case '01': 
    		$return_month = 'January';
			break; 
			case '02': 
    		$return_month = 'Febuary';
			break;  
			case '03': 
    		$return_month = 'March';
			break;  
			case '04': 
    		$return_month = 'April';
			break;  
			case '05': 
    		$return_month = 'May';
			break;  
			case '06': 
    		$return_month = 'June';
			break;  
			case '07': 
    		$return_month = 'July';
			break;  
			case '08': 
    		$return_month = 'August';
			break;  
			case '09': 
    		$return_month = 'September';
			break;  
			case '10': 
    		$return_month = 'October';
			break;  
			case '11': 
    		$return_month = 'November';
			break;  
			case '12': 
    		$return_month = 'December';
			break; 
		}

		return $return_month;  
	}


	$DB_HOSTNAME="172.10.10.101";
	$DB_PORT=3306;
	$DB_USERNAME="root";
	$DB_PASSWORD="c$$@PP704";
	$DB_NAME="smartsolution";

?>