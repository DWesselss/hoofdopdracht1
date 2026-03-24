<?php
$host = 'localhost';
$db   = 'p3_app';
$user = 'root';
$pass = 'root';
$port = '8889';

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database verbinding mislukt.');
}
