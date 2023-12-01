<?php

// $servername = "your_mysql_server";
// $username = "your_mysql_username";
// $password = "your_mysql_password";
// $dbname = "your_mysql_database";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'guvi.charan');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $postCode = $_POST["postCode"];
    $country = $_POST["country"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Check if email or phone number already exists
    $checkQuery = "SELECT * FROM user WHERE email = ? OR phoneNumber = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ss", $email, $phoneNumber);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // User already exists
        echo "User with the same email or phone number already exists!";
    } else {
        // Insert new user data
        $insertQuery = "INSERT INTO user (firstName, lastName, address, postCode, country, email, phoneNumber, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("ssssssss", $firstName, $lastName, $address, $postCode, $country, $email, $phoneNumber, $password);

        if ($insertStmt->execute()) {
            // Registration successful
            echo "Registration successful!";
        } else {
            // Error during registration
            echo "Error during registration: " . $insertStmt->error;
        }

        $insertStmt->close();
    }

    $checkStmt->close();
}

$conn->close();