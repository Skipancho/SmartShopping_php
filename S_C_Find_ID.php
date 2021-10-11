<?php
	include "DB.php";
	
	$name = $_POST["name"];
	$phoneNum = $_POST["phoneNum"];

	$result = mysqli_query($con,"SELECT userID From S_C_USER WHERE name = '$name' AND phoneNum = '$phoneNum'");
	
	$response = array();

	while($row = mysqli_fetch_array($result)){
		array_push($response,array("userID"=>$row[0]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>