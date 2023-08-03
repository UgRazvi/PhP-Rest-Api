<?php

header('Content-Type: application/json'); // Defining Content Type as : application/json
header('Access-Control-Allow-Origin: *'); // Defining Access Control as (*) : to All

include "config.php"; // Including Connection File

$sql = "SELECT * FROM students"; // SQL Query to select all records
$result = mysqli_query($conn, $sql) or die("SQL Query Failed."); // Sending Query otherwise die with message

if(mysqli_num_rows($result) > 0 ){ // If data is being fetched successfully.
	
	$output = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch the result as an Associative Array.
	echo json_encode($output); // Convert the result to JSON format

}else{

 echo json_encode(array('message' => 'No Record Found.', 'status' => false)); // if no record found.

}


?>
