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
     * @var string
     */
    private $redirect = null;

    private function __construct()
    {
    }

    /**
     * @param $view
     * @param $statusCode
     * @param ResponseData $data
     * @return Response
     */
    public static function htmlResponse($view, $statusCode, ResponseData $data = null)
    {
        $response = new Response();
        $response->view = $view;
        $response->statusCode = $statusCode;
        $response->data = $data;

        return $response;
    }


    public static function redirectResponse($redirectTo, $statusCode)
    {
        $response = new Response();
        $response->redirect = $redirectTo;
        $response->statusCode = $statusCode;

        return $response;
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

    /**
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

}