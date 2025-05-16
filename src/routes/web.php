<?php

namespace FlowPHP\routes;

use FlowPHP\routes\Router;
use FlowPHP\controllers\HomeController;
use FlowPHP\core\View;

class Web
{
    private $router;
    private $homeController;

    public function __construct(\PDO $pdo)
    {
        $this->homeController = new HomeController();
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
        $this->router->get('/', fn() => View::render('welcome', ['greeting' => 'Welcome to FlowPHP']));
        $this->router->get('/home', fn() => $this->homeController->homeWithLayout());
        // Dispatch request
        $this->router->dispatch();
    }
}
