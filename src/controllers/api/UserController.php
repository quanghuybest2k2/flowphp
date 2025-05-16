<?php

namespace FlowPHP\controllers\api;

use FlowPHP\services\UserService;
use FlowPHP\utils\ResponseHandler;
use Exception;

class UserController
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Show user by id
     *
     * @param int $id
     * @return void
     */
    public function show($id): void
    {
        try {
            $user = $this->service->getUserById($id);
            ResponseHandler::responseSuccess($user);
        } catch (Exception $e) {
            ResponseHandler::responseError($e->getMessage(), "No User found", 404);
        }
    }

    /**
     * List all users
     *
     * @return void
     */
    public function list(): void
    {
        try {
            $users = $this->service->getAllUsers();
            ResponseHandler::responseSuccess($users);
        } catch (Exception $e) {
            ResponseHandler::responseError($e->getMessage(), "No User list found", 404);
        }
    }

    /**
     * Create a new user
     *
     * @return void
     */
    public function store(): void
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['name'], $data['email'], $data['password'])) {
            ResponseHandler::responseError("Invalid input", "Bad request", 400);
            return;
        }

        try {
            $user = $this->service->createUser($data['name'], $data['email'], $data['password']);
        } catch (Exception $e) {
            ResponseHandler::responseError($e->getMessage(), "User create fail", 400);
            return;
        }

        ResponseHandler::responseSuccess($user, "User created successfully", 201);
    }
}
