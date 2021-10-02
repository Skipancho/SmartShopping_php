<?php
	include "DB.php";
	
	$userID = $_POST["userID"];	 
	$newPw = $_POST["newPw"];	

	$checkedPW = password_hash($newPw, PASSWORD_DEFAULT);
	$statement= mysqli_prepare($con,"UPDATE S_C_USER SET userPW = ?   WHERE userID = ?");
	mysqli_stmt_bind_param($statement,"ss",$checkedPW,$userID);
	mysqli_stmt_execute($statement);

	$response = array();
	$response["success"] = true;

	echo json_encode($response);
	mysqli_close($con);
?>