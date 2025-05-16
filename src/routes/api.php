<?php

namespace FlowPHP\routes;

use FlowPHP\routes\Router;
use FlowPHP\controllers\api\UserController;
use FlowPHP\repositories\UserRepository;
use FlowPHP\services\UserService;
use FlowPHP\utils\ResponseHandler;

class Api
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
        // Cut prefix "api" from the URL
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $apiUri = preg_replace('#^/api#', '', $uri);

        // Define routes
        $this->router->get('/welcome', fn() => ResponseHandler::responseSuccess("Welcome to the API"));
        $this->router->get('/users/{id}', fn($id) => $this->userController->show((int)$id));
        $this->router->get('/users', fn() => $this->userController->list());
        $this->router->post('/users', fn() => $this->userController->store());
        // dispatch route
        $this->router->dispatch($apiUri);
    }
}
