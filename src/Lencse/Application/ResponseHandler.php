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
        400 => 'Bad Request',
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
     * @return HandledResponse
     */
    public function handle(Response $response)
    {
        if ($response->getRedirect()) {
            return new HandledResponse([sprintf('Location: %s', $response->getRedirect())], '');

        }
        return new HandledResponse(
            [
                sprintf('HTTP/1.1 %d %s', $response->getStatusCode(), $this->messages[$response->getStatusCode()]),
                'Content-Type: text/html; charset=utf-8',
            ],
            $this->templating->render($response->getView(), $response->getData())
        );
    }

}