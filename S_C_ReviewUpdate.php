<?php
	include "DB.php";
	
	$rID = $_POST["rID"];
	$score = $_POST["score"];
	$rText = $_POST["rText"];

	$statement= mysqli_prepare($con,"UPDATE S_C_REVIEW SET score = ?,rText = ? WHERE rID = ?");
	mysqli_stmt_bind_param($statement,"isi",$score,$rText,$rID);
	mysqli_stmt_execute($statement);

	$response = array();
	$response["success"] = true;

	echo json_encode($response);
?>