<?php
	include "DB.php";

	$userID = $_POST["userID"];
	$phoneNum = $_POST["phoneNum"];
	$name = $_POST["name"];
	$nickName = $_POST["nickName"];

	$statement= mysqli_prepare($con,"UPDATE S_C_USER SET  phoneNum = '$phoneNum',name='$name',nickName ='$nickName'  WHERE userID = '$userID'");
	mysqli_stmt_bind_param($statement,"ssss",$userID,$phoneNum,$name,$nickName);
	mysqli_stmt_execute($statement);

	$response = array();
	$response["success"] = true;

	echo json_encode($response);
	mysqli_close($con);
?>