<?php
	include "DB.php";
	
	$userID = $_POST["userID"];
	$userPW = $_POST["userPW"];
	$phoneNum = $_POST["phoneNum"];
	$name = $_POST["name"];
	$nickName = $_POST["nickName"];
	$pwAsk = $_POST["pwAsk"];
	$pwAnswer = $_POST["pwAnswer"];
	$token = null;

	$checkedPW = password_hash($userPW, PASSWORD_DEFAULT);
	$statement= mysqli_prepare($con,"INSERT INTO S_C_USER VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($statement,"ssssssss",$userID,$checkedPW,$phoneNum,$name,$nickName, $pwAsk,$pwAnswer,$token);
	mysqli_stmt_execute($statement);

	$response = array();
	$response["success"] = true;

	echo json_encode($response);
?>