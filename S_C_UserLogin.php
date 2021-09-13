<?php
	include "DB.php";
	
	$userID = $_POST["userID"];
	$userPW = $_POST["userPW"];
	$token_key = $_POST["key"]; 

	#if($token_key == null) $token_key = "";
	
	$statement = mysqli_prepare($con,"SELECT * FROM S_C_USER WHERE userID = ?");
	mysqli_stmt_bind_param($statement,"s",$userID);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID, $checkedPW, $phoneNum, $name, $nickName ,$pwAsk, $pwAnswer, $token);

	$response = array();
	$response["success"] = false;
	
	while(mysqli_stmt_fetch($statement)){
		if(password_verify($userPW, $checkedPW)){
			$response["success"] = true;
			$response["userID"] = $userID;
			$response["phoneNum"] = $phoneNum;
			$response["name"] = $name;
			$response["nickName"] = $nickName;		
			
			if($token_key != null){
				$token_v = date("YmdHis");
				$response["token"] = $token_v;

				$token = $token_v.$token_key;

				$t_save= mysqli_prepare($con,"UPDATE S_C_USER SET token = ? WHERE userID = ?");
				mysqli_stmt_bind_param($t_save,"ss",$token,$userID);
				mysqli_stmt_execute($t_save);	
			}
		}
	}

	echo json_encode($response);
?>