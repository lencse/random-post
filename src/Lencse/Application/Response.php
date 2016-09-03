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
     * @var ResponseData
     */
    private $data;

    /**
     * @param string $view
     * @param int $statusCode
     * @param ResponseData $data
     */
    public function __construct($view, $statusCode, ResponseData $data = null)
    {
        $this->view = $view;
        $this->statusCode = $statusCode;
        $this->data = $data;
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

    /**
     * @return ResponseData
     */
    public function getData()
    {
        return $this->data;
    }

}