<?php

namespace Lencse\Framework;


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

    /**
     * @return Controller
     */
    private function getController()
    {
        if (!isset($this->controller)) {
            $this->controller = new Controller();
        }

        return $this->controller;
    }

}