<?php

use src\utils\ResponseHandler;

require_once __DIR__ . '/env.php';
loadEnv(__DIR__ . '/../../.env');

$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    ResponseHandler::responseError('Database connection failed: ' . $e->getMessage(), "Internal Server Error", 500);
    exit;
}
