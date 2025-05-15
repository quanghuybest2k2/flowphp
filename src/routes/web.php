<?php

namespace FlowPHP\routes;

use FlowPHP\routes\Router;
use FlowPHP\controllers\UserController;
use FlowPHP\repositories\UserRepository;
use FlowPHP\services\UserService;
use FlowPHP\utils\ResponseHandler;

class Web
{
    private $router;
    private $userController;

    public function __construct(\PDO $pdo)
    {
        $repo = new UserRepository($pdo);
        $service = new UserService($repo);
        $this->userController = new UserController($service);
        $this->router = new Router();
    }

    /**
     * Handle the incoming request.
     *
     * @return void
     */
    public function handleRequest(): void
    {
        // Default route
        $this->router->get('/', fn() => ResponseHandler::responseSuccess("Welcome to the API"));

        // User route
        $this->router->get('/users/{id}', fn($id) => $this->userController->show((int)$id));
        $this->router->get('/users', fn() => $this->userController->list());
        $this->router->post('/users', fn() => $this->userController->store());

        // Dispatch request
        $this->router->dispatch();
    }
}
