<?php
	include "DB.php";

	$userID = $_GET["userID"];

	$result = mysqli_query($con,"SELECT S_C_PRODUCT.pName, S_C_PURCHASE.* FROM S_C_PURCHASE, S_C_PRODUCT WHERE S_C_PURCHASE.userID = '$userID' AND S_C_PURCHASE.pCode = S_C_PRODUCT.pCode ORDER BY pKey DESC");
	
	$response = array();
	
	while($row = mysqli_fetch_array($result)){
		array_push($response,array("pName"=>$row[0],"userID"=>$row[1],"pCode"=>$row[2],"price"=>$row[3],"amount"=>$row[4],"bDate"=>$row[5],"review"=>$row[6],"pKey"=>$row[7]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>