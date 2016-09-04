<?php

namespace Lencse\Application;


class Request
{

    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $method;

    private function __construct()
    {
    }

    /**
     * @SuppressWarnings(PHPMD.Superglobals)
     * @return Request
     */
    public static function createFromGlobals()
    {
        $request = new Request();
        $request->uri = $_SERVER['REQUEST_URI'];
        $request->method = $_SERVER['REQUEST_METHOD'];

        return $request;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

}