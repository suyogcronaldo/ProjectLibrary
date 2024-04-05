<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {        

    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $email_id = $_POST["email_id"];
    $phone_number = $_POST["phone_number"];
    $city = $_POST["city"];

    try {
        require_once "dbh_inc.php";

        $query = "INSERT INTO users (username, f_name, l_name, email_id, phone_number, city) VALUES (?, ?, ?, ?, ?, ?, ?);";
        
        $stmt = $pdo->prepare($query);

        $stmt->execute([$username,$password, $f_name, $l_name, $email_id, $phone_number, $city]);

        $pdo = null;
        $stmt = null;

        exit();

    } catch(PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../admin-dashboard.html?id=addUserForm");
}
?>
