<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile'])) {

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    $email = $_POST['email'];

    $servername = "localhost";
    $username = "sqluser";
    $password = "987654";
    $dbname = "guvi";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT useremail,username,userdob,usernumber,userid FROM auth where useremail='$email'";
    
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        die(json_encode(array("email" => $row["useremail"], "number" => $row["usernumber"], "dob" => $row["userdob"], "name" => $row["username"],"id"=>$row["userid"])));
    }$conn->close();
}
?>