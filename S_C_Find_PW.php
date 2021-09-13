<?php
	include "DB.php";
	
	$userID = $_POST["userID"];
	$phoneNum = $_POST["phoneNum"];
	$name = $_POST["name"];
	$pwAsk = $_POST["pwAsk"];
	$pwAnswer = $_POST["pwAnswer"];


	$statement = mysqli_prepare($con,"SELECT userID FROM S_C_USER WHERE userID = ? AND phoneNum = ? AND name = ? AND pwAsk = ? AND pwAnswer = ?");
	mysqli_stmt_bind_param($statement,"sssss",$userID,$phoneNum,$name,$pwAsk,$pwAnswer);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID);

	$response = array();
	$response["success"] = false;
	
	while(mysqli_stmt_fetch($statement)){
		$response["success"] = true;
	}

	echo json_encode($response);
?>