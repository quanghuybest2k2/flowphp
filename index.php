<?php

require_once __DIR__ . '/./vendor/autoload.php';

use FlowPHP\routes\Web;
use FlowPHP\config\Database;
use FlowPHP\utils\Logger;

try {
    $db = new Database();
    $pdo = $db->getConnection();
    $router = new Web($pdo);
    $router->handleRequest();
} catch (Exception $e) {
    Logger::error("Error: " . $e->getMessage());
}
