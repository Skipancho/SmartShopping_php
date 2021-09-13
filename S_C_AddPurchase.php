<?php
	include "DB.php";
	
	$pkey = null;
	$userID = $_POST["userID"];
	$pCode = $_POST["pCode"];
	$price = $_POST["price"];
	$amount = $_POST["amount"];
	$bDate = $_POST["bDate"];
	$review = 0;

	$product_amount = 0;
	$result = mysqli_query($con,"SELECT amount FROM S_C_PRODUCT WHERE pCode = '$pCode'");
	while($row = mysqli_fetch_array($result)){
		$product_amount = $row[0];
	}
	if($product_amount >= (int)$amount){
		$statement= mysqli_prepare($con,"INSERT INTO S_C_PURCHASE VALUES(?,?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($statement,"ssiisii",$userID,$pCode,$price,$amount,$bDate,$review,$pkey);
		mysqli_stmt_execute($statement);

		$state2 =  mysqli_prepare($con,"UPDATE S_C_PRODUCT SET amount = amount - $amount WHERE pCode = '$pCode'");
		mysqli_stmt_bind_param($state2,"is",$amount, $pCode);
		mysqli_stmt_execute($state2);

		$response = array();
		$response["success"] = true;

		echo json_encode($response);
	}else{
		$response = array();
		$response["success"] = false;
		$response["reason"] = "no item";
		echo json_encode($response);
	}	
?>