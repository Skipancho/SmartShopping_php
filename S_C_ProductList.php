<?php
	include "DB.php";

	$mode = $_GET["mode"];
	$searchText = $_GET["searchText"];

	if($mode == "pCode"){
		$result = mysqli_query($con,"SELECT * FROM S_C_PRODUCT WHERE $mode = '$searchText'");
	}else{
		$result = mysqli_query($con,"SELECT * FROM S_C_PRODUCT WHERE $mode like '%$searchText%' order by price");
	}

	
	$response = array();
	
	while($row = mysqli_fetch_array($result)){
		array_push($response,array("pCode"=>$row[0],"pName"=>$row[1],"info"=>$row[2],"price"=>$row[3],"type"=>$row[4],"amount"=>$row[5]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>