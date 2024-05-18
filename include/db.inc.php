<?php

$host = "127.0.0.1";
$port = 3306;
$socket = "";
$user = "root";
$password = "7836";
$dbname = "myshop";

try {
    $connect = new PDO("mysql:host=localhost;dbname=myshop", $user, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_log("connection successfully");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
