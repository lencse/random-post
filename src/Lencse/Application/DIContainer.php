<?php

namespace Lencse\Application;


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
     * @var ResponseHandler
     */
    private $responseHandler;

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
     * @return ResponseHandler
     */
    public function getResponseHandler()
    {
        if (!isset($this->responseHandler)) {
            $this->responseHandler = new ResponseHandler();
        }

        return $this->responseHandler;
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