<?php
	include "DB.php";
	
	$rID = $_POST["rID"];
	
	$statement= mysqli_prepare($con,"DELETE FROM S_C_REVIEW WHERE rID = ?");
	mysqli_stmt_bind_param($statement,"i",$rID);
	mysqli_stmt_execute($statement);

	$response = array();
	$response["success"] = true;

	echo json_encode($response);
	mysqli_close($con);
?>