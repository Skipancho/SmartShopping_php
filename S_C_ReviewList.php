<?php
	include "DB.php";

	$mode = $_GET["mode"];
	$find = $_GET["find"];

	if($mode == "pCode"){
		$result = mysqli_query($con,"SELECT rID,pCode,score,nickName,rText,rDate FROM S_C_REVIEW, S_C_USER WHERE S_C_REVIEW.userID = S_C_USER.userID AND S_C_REVIEW.pCode = '$find' ORDER BY rID DESC");	
		
		$response = array();
		while($row = mysqli_fetch_array($result)){
			array_push($response,array("rID"=>$row[0],"pCode"=>$row[1],"score"=>$row[2],"nickName"=>$row[3],"rText"=>$row[4],"rDate"=>$row[5]));
		}	
	}else if($mode == "userID"){
		$result = mysqli_query($con,"SELECT S_C_REVIEW.*, pName FROM S_C_REVIEW,S_C_PRODUCT WHERE userID = '$find' AND S_C_REVIEW.pCode = S_C_PRODUCT.pCode ORDER BY rID DESC");	

		$response = array();
		while($row = mysqli_fetch_array($result)){
			array_push($response,array("rID"=>$row[0],"pCode"=>$row[1],"userID"=>$row[2],"score"=>$row[3],"rText"=>$row[4],"rDate"=>$row[5],"pName"=> $row[6]));
		}
	}	
	

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>