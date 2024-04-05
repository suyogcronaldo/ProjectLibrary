<?php

    $dsn = "mysql:host=localhost;dbname=librarydb";
    $dbusername = "root";
    $dbpassword = "";

    try{
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($pdo) {
            echo "Connected successfully<br>";
        }

        $stmt = $pdo->query("SELECT * FROM users");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        echo "username: " . $row['username'] . ",  password: " . $row['password'] . ", f_name: " . $row['f_name'] . ", l_name: " . $row['l_name'] . ", email_id: " . $row['email_id'] . ", phone_number: " . $row['phone_number'] . ", city: " . $row['city'] . "<br>";
    }
    } 
    catch (PDOException $e) {
        echo "Connection Failed: ". $e->getMessage();

    }
    ?>