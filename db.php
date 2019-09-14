<?php
// Connection to database
$dsn = "mysql:host=localhost;dbname=paginationtest";
$user = "root";
$password = "";
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "ConnectionFailed:", $e->getMessage();
}