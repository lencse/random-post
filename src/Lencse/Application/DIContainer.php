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
     * @var DB
     */
    private $db;

    /**
     * @var Messaging
     */
    private $messaging;

    /**
     * @var SessionInterface
     */
    private $session;

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
            $this->controller = new Controller($this->getMongoPostRepository(), $this->getMessaging());
        }

        return $this->controller;
    }

    /**
     * @return Messaging
     */
    public function getMessaging()
    {
        if (!isset($this->messaging)) {
            $this->messaging = new Messaging($this->getSession());
        }

        return $this->messaging;
    }

    /**
     * @return PostRepository
     */
    private function getMongoPostRepository()
    {
        return new RiskyPostRepository($this->getDB(), $this->getMessaging());
    }

    /**
     * @return DB
     */
    private function getDB()
    {
        if (!isset($this->db)) {
            $dbConf = $this->config['db'];
            if ($dbConf == 'demo') {
                $this->db = new DemoDB();
            }
            elseif (is_array($dbConf['mongo'])) {
                $this->db = new MongoDB($dbConf['mongo']['connectionString'], $dbConf['mongo']['collection']);
            }
        }

        return $this->db;
    }

    /**
     * @return SessionInterface
     */
    private function getSession()
    {
        if (!isset($this->session)) {
            $sessionConf = $this->config['session'];
            if ($sessionConf == 'in-memory') {
                $this->session = new InMemorySession();
            }
            elseif ($sessionConf == 'session') {
                $this->session = new Session();
            }
        }

        return $this->session;
    }


}