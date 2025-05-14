<?php

namespace src\repositories;

use src\models\User;
use PDO;

class UserRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Find user by id
     * 
     * @param int $id
     * @return User|null
     */
    public function findById($id): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if ($row) {
            return new User($row['id'], $row['name'], $row['email']);
        }

        return null;
    }

    /**
     * Find user by email
     * 
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if ($row) {
            return new User($row['id'], $row['name'], $row['email']);
        }

        return null;
    }


    /**
     * Find all users
     * 
     * @return array
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $users = [];
        foreach ($rows as $row) {
            $users[] = new User($row['id'], $row['name'], $row['email']);
        }
        return $users ?? [];
    }

    /**
     * Create a new user
     * 
     * @return User
     */
    public function create(User $user): User
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$user->name, $user->email, $user->password]);
        $user->id = $this->pdo->lastInsertId();
        return $user;
    }
}
