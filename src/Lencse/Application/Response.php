<?php

namespace Lencse\Application;


class Response
{

    /**
     * @var string
     */
    private $view;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @param string $view
     * @param int $statusCode
     */
    public function __construct($view, $statusCode)
    {
        $this->view = $view;
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

}