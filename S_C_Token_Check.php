<?php
	include "DB.php";

	$userID = $_POST["userID"];
	$token = $_POST["token"];

	$statement = mysqli_prepare($con,"SELECT token FROM S_C_USER WHERE userID = ?");
	mysqli_stmt_bind_param($statement,"s",$userID);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $token_server);

	$response["success"] = false;

	while(mysqli_stmt_fetch($statement)){
		if($token == $token_server){
			$response["success"] = true;
		}
	}

	echo json_encode($response);
	mysqli_close($con);
?>