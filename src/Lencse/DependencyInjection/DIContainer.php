<?php

namespace Lencse\DependencyInjection;


use Lencse\Controller\Controller;
use Lencse\Routing\Router;

class DIContainer
{

    /**
     * @var Controller
     */
    private $controller;

    /**
     * @var Router
     */
    private $router;

    /**
     * @return Router
     */
    public function getRouter()
    {
        if (!isset($this->router)) {
            $this->router = new Router($this->getController());
        }

        return $this->router;
    }

    private function getController()
    {
        if (!isset($this->controller)) {
            $this->controller = new Controller();
        }

        return $this->controller;
    }

}