<?php
	include "DB.php";

	$userID = $_GET["userID"];
	$first = $_GET["first"];
	$last = $_GET["last"];

	$result = mysqli_query($con,"SELECT p.type, SUM(p.price)s FROM (SELECT S_C_PURCHASE.*, S_C_PRODUCT.type FROM S_C_PURCHASE, S_C_PRODUCT WHERE bDate >= '$first' AND bDate <'$last' AND S_C_PURCHASE.userID = '$userID' AND S_C_PURCHASE.pCode = S_C_PRODUCT.pCode)p GROUP BY p.type");
	
	$response = array();
	
	while($row = mysqli_fetch_array($result)){
		array_push($response,array("type"=>$row[0],"price"=>$row[1]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>