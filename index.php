<?php

require_once __DIR__ . '/./vendor/autoload.php';
require_once __DIR__ . '/./src/config/database.php';

use src\routes\Web;

$router = new Web($pdo);
$router->handleRequest();
