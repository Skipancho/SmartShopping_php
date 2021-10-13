<?php
	include "DB.php";

	$rID = null;
	$pCode = $_POST["pCode"];
	$userID = $_POST["userID"];
	$score = $_POST["score"];
	$rText = $_POST["rText"];
	$rDate = date("Y-m-d");
	$pKey = $_POST["pKey"];

	$statement= mysqli_prepare($con,"INSERT INTO S_C_REVIEW VALUES(?, ?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($statement,"ississ",$rID,$pCode,$userID,$score,$rText, $rDate);
	mysqli_stmt_execute($statement);


	$s2= mysqli_prepare($con,"UPDATE S_C_PURCHASE SET  review = 1 WHERE pKey = '$pKey'");
	mysqli_stmt_bind_param($s2,"ii",$review,$pKey);
	mysqli_stmt_execute($s2);

	$response = array();
	$response["success"] = true;

	echo json_encode($response);
	mysqli_close($con);
?>