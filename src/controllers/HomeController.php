<?php

namespace FlowPHP\controllers;

use FlowPHP\core\View;

class HomeController
{
    public function homeWithLayout(): string
    {
        $data = [
            'title' => 'Home Page',
            'message' => 'Home page content goes here.',
        ];

        // Render the view with layout
        return View::renderWithLayout('home', $data);
    }
}
