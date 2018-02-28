<?php
	error_reporting(E_ALL);
	session_start();
	date_default_timezone_set('Asia/Bangkok');
	include ('lib/configuration.php');
	
	isset($_REQUEST['UID']) ? $UID = $_REQUEST['UID'] : $UID = "";
	isset($_REQUEST['DEVICE_ID']) ? $DEVICE_ID = $_REQUEST['DEVICE_ID'] : $DEVICE_ID = "";
	
	$con = mysqli_connect($DB_HOSTNAME,$DB_USERNAME,$DB_PASSWORD);
	if(!$con){echo "Not connect";}
	mysqli_select_db($con,$DB_NAME);
	mysqli_query($con,"SET NAMES tis620");		
	
	$CHECK_STMT_AGENT="SELECT * FROM `smartsolution`.`source_table` where SOURCE_ID like '$UID';";
	
	$RESULT_CHECK_AGENT = mysqli_query($con,$CHECK_STMT_AGENT);
	$NO_ROW = mysqli_num_rows($RESULT_CHECK_AGENT);
	
	if($NO_ROW>0){
		while($RECORD_CHECK_AGENT = mysqli_fetch_array($RESULT_CHECK_AGENT)){
			
			$SOURCE_ID=$RECORD_CHECK_AGENT['SOURCE_ID'];
			$PARENT_NO=$RECORD_CHECK_AGENT['PARENT_NO'];
			$SOURCE_NAME=$RECORD_CHECK_AGENT['SOURCE_NAME'];
			
			echo "$SOURCE_ID";
			echo "$PARENT_NO";
			echo "$SOURCE_NAME";
		}	
	}else{
		$INSERT_STMT_AGENT="INSERT INTO `smartsolution`.`source_table`(`SOURCE_ID`,`PARENT_NO`,`SOURCE_NAME`) VALUES('$UID','','$DEVICE_ID');";
		echo $INSERT_STMT_AGENT;
		mysqli_query($con,$INSERT_STMT_AGENT);	
	}

	isset($_REQUEST['SENSOR_ID']) ? $SENSOR_ID = $_REQUEST['SENSOR_ID'] : $SENSOR_ID = "";
	isset($_REQUEST['SOURCE_ID']) ? $SOURCE_ID = $_REQUEST['SOURCE_ID'] : $SOURCE_ID = "";
	isset($_REQUEST['VALUE']) ? $VALUE = $_REQUEST['VALUE'] : $VALUE = "";
	if($SENSOR_ID=="" || $SENSOR_ID=="" || $SENSOR_ID==""){
		echo "NO DATA.";
		return 999;
	}else{
		addEnergyData($con,$SENSOR_ID,$SOURCE_ID,$VALUE);
	}
		
	function addEnergyData($con,$SENSOR_ID,$SOURCE_ID,$VALUE){
		$INSERT_STMT_ENERGY="INSERT INTO `smartsolution`.`ss_raw_data`(`SENSOR_ID`,`VALUE`,`SOURCE_ID`) VALUES('$SENSOR_ID',$VALUE,'$SOURCE_ID');";
		echo $INSERT_STMT_ENERGY;	
		mysqli_query($con,$INSERT_STMT_ENERGY);	
		
	}

	
?>
