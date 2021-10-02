<?php
	include "DB.php";

	$userID = $_GET["userID"];
	$year = $_GET["year"];

	$result = mysqli_query($con,
	"SELECT MONTH (bDate) AS date, SUM(price) 
	FROM S_C_PURCHASE 
	WHERE userID = '$userID' AND YEAR(bDate) = $year 
	GROUP BY date 
	ORDER BY date");
	
	$response = array();
	
	while($row = mysqli_fetch_array($result)){
		array_push($response,array("month"=>$row[0],"price"=>$row[1]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>