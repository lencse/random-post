<?php

namespace Lencse\Application;


class ResponseHandler
{

    /**
     * @var string[]
     */
    private $messages = [
        200 => 'OK',
        404 => 'Not Found',
    ];

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

        return new ResponsePresentation($headers, sprintf('<p>View: %s</p>', $response->getView()));
    }

}