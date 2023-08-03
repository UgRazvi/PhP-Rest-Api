<?php
header('Content-Type: application/json'); // Declaring COntent Type : Application / JSON.
header('Access-Control-Allow-Origin: *'); // Declaring Access Control to (*) All.

$data = json_decode(file_get_contents("php://input"), true); // (php://input) to read any kind of data, instead of ($_GET or $_POST) like PHP, true is for getting data as Associative array

$student_id = $data['sid'];

include "config.php"; // Included To build Connection with the Database.

$sql = "SELECT * FROM students WHERE id = {$student_id}"; // SQL Query.

$result = mysqli_query($conn, $sql) or die("SQL Query Failed."); // Data will be fetched here as Result.

if (mysqli_num_rows($result) > 0) { // If Data get fetched...

	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($output); // To encode data from Array to json format. 

} else {

	echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}


?>

