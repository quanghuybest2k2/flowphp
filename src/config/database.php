<?php

namespace src\config;

use PDO;
use PDOException;
use src\utils\ResponseHandler;

require_once __DIR__ . '/env.php';

class Database
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $pdo;

    public function __construct()
    {
        loadEnv(__DIR__ . '/../../.env');

        $this->host = getenv('DB_HOST');
        $this->db   = getenv('DB_NAME');
        $this->user = getenv('DB_USER');
        $this->pass = getenv('DB_PASS');

        $this->connect();
    }

    private function connect()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            ResponseHandler::responseError(
                'Database connection failed: ' . $e->getMessage(),
                "Internal Server Error",
                500
            );
            exit;
        }
    }

    /**
     * Get the PDO object to query the database.
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
