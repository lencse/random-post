<?php

namespace Lencse\Application;


class Request
{

    /**
     * @var string
     */
    private $uri;

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

        return $request;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

}