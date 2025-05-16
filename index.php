<?php
require_once __DIR__ . '/vendor/autoload.php';

use FlowPHP\routes\Web;
use FlowPHP\routes\Api;
use FlowPHP\config\Database;
use FlowPHP\utils\Logger;

// config access static files
$requestUri = $_SERVER['REQUEST_URI'];
if (preg_match('#^/public/(.+)$#', $requestUri, $matches)) {
    $filePath = __DIR__ . '/public/' . $matches[1];

    if (file_exists($filePath) && is_file($filePath)) {
        $mimeType = mime_content_type($filePath);
        header('Content-Type: ' . $mimeType);
        readfile($filePath);
        exit;
    } else {
        http_response_code(404);
        echo "File not found.";
        exit;
    }
}

try {
    $db = new Database();
    $pdo = $db->getConnection();

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (preg_match('#^/api(/|$)#', $uri)) {
        $api_router = new Api($pdo);
        $api_router->handleRequest();
    } else {
        $web_router = new Web($pdo);
        $web_router->handleRequest();
    }
} catch (Exception $e) {
    Logger::error("Error: " . $e->getMessage());
}
