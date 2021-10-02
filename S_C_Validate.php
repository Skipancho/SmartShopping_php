<?php
	include "DB.php";

	$mode = $_POST["mode"];
	$find = $_POST["find"];

	$statement =mysqli_prepare($con,"SELECT $mode FROM S_C_USER WHERE $mode = ?");
	mysqli_stmt_bind_param($statement,"s",$find);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement,$find);

	$response = array();
	$response["success"] =true;

	while(mysqli_stmt_fetch($statement)){
		$response["success"] = false;		
	}

	echo json_encode($response);
	mysqli_close($con);
?>