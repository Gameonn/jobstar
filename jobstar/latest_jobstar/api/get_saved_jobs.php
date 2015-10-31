<?php
//this is an api to get saved jobs

// +-----------------------------------+
// + STEP 1: include required files    +
// +-----------------------------------+
require_once("../php_include/db_connection.php");
require_once("DataClass.php");
$success=$msg="0";$data=array();
// +-----------------------------------+
// + STEP 2: get data				   +
// +-----------------------------------+

$uid=$_REQUEST['user_id'];

global $conn;

if(!($uid)){
	$success="0";
	$msg="Incomplete Parameters";
	$data=array();
}
else{ 
	
	$data = DataClass::get_saved_jobs($uid)? DataClass::get_saved_jobs($uid):[];

	if($data){
	$success='1';
	$msg="User Saved Job Details";
	}
	else{
	$success='0';
	$msg="No data found for this user";
	}	
}
// +-----------------------------------+
// + STEP 4: send json data			   +
// +-----------------------------------+
if($success=="1"){
echo json_encode(array("success"=>$success,"msg"=>$msg,"data"=>$data));
}
else
echo json_encode(array("success"=>$success,"msg"=>$msg));
?>