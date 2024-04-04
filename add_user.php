<?php
$servername = "localhost";
$username = "username"; // Your MySQL username
$password = "password"; // Your MySQL password
$database = "your_database"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email_id = $_POST['email_id'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$city = $_POST['city'];

// SQL query to insert user data into the database
$sql = "INSERT INTO users (username, password, first_name, last_name, email, phone_number, address, city)
        VALUES ('$username', '$password', '$f_name', '$l_name', '$email_id', '$phone_number', '$address', '$city')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>