<?php

namespace Lencse\Application;


class DIContainer
{

    /**
     * @var array
     */
    private $config;

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
     * @var Templating
     */
    private $templating;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

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
            $this->responseHandler = new ResponseHandler($this->getTemplating());
        }

        return $this->responseHandler;
    }

    /**
     * @return Templating
     */
    public function getTemplating()
    {
        if (!isset($this->templating)) {
            $this->templating = new Templating($this->config['viewPath']);
        }

        return $this->templating;
    }

    /**
     * @return Controller
     */
    private function getController()
    {
        if (!isset($this->controller)) {
            $this->controller = new Controller($this->getMongoPostRepository());
        }

        return $this->controller;
    }

    /**
     * @return MongoPostRepository
     */
    private function getMongoPostRepository()
    {
        return new MongoPostRepository($this->getMongoDB());
    }

    /**
     * @return MongoDB
     */
    private function getMongoDB()
    {
        return new MongoDB($this->config['mongoConnectionString'], $this->config['mongoCollection']);
    }

}