<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "your_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        // Redirect user to reserve.html
        header("Location: reserve.html");
        exit();
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>