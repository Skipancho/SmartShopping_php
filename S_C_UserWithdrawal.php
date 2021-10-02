<?php
	include "DB.php";
	
	$userID = $_POST["userID"];
	
	$statement= mysqli_prepare($con,"DELETE FROM S_C_USER WHERE userID = ?");
	mysqli_stmt_bind_param($statement,"s",$userID);
	mysqli_stmt_execute($statement);

	$s2= mysqli_prepare($con,"DELETE FROM S_C_PURCHASE WHERE userID = ?");
	mysqli_stmt_bind_param($s2,"s",$userID);
	mysqli_stmt_execute($s2);

	$s3= mysqli_prepare($con,"DELETE FROM S_C_REVIEW WHERE userID = ?");
	mysqli_stmt_bind_param($s3,"s",$userID);
	mysqli_stmt_execute($s3);


	$response = array();
	$response["success"] = true;

	echo json_encode($response);
	mysqli_close($con);
?>