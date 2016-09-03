<?php

namespace Lencse\Application;


class ResponseHandler
{

    /**
     * @var Templating
     */
    private $templating;

    /**
     * @var string[]
     */
    private $messages = [
        200 => 'OK',
        404 => 'Not Found',
    ];

    /**
     * @param Templating $templating
     */
    public function __construct(Templating $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @param Response $response
     * @return ResponsePresentation
     */
    public function handle(Response $response)
    {
        $headers = [
            sprintf('HTTP/1.1 %d %s', $response->getStatusCode(), $this->messages[$response->getStatusCode()]),
            'Content-Type: text/html; charset=utf-8',
        ];

        return new ResponsePresentation($headers, $this->templating->render($response->getView(), $response->getData()));
    }

}