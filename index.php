<?php

require_once __DIR__ . '/./vendor/autoload.php';

use src\routes\Web;
use src\config\Database;
use src\utils\Logger;

try {
    $db = new Database();
    $pdo = $db->getConnection();
    $router = new Web($pdo);
    $router->handleRequest();
} catch (Exception $e) {
    Logger::error("Error: " . $e->getMessage());
}
