<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    $user = $_POST['username'];
	$pass = $_POST['password'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Guvi-Task-master";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	 $sql = "SELECT * FROM auth WHERE useremail='$user' AND userpassword='$pass'";
	 $result = $conn->query($sql);

	if ($result->num_rows == 1) {
		die(json_encode(array('status'=>true)));
	} else {
		die(json_encode(array("status"=>false)));
	}
	$conn->close();
	$conn->close();
$text=$user;
echo json_encode(array('text' => $text,'name'=>"eshwar" /* and anything else you want */));

}
