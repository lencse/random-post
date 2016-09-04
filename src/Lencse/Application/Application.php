<?php

namespace Lencse\Application;


class Application
{

    /**
     * @var Router
     */
    private $router;

    /**
     * @var ResponseHandler
     */
    private $responseHandler;

    /**
     * @var Messaging
     */
    private $messaging;

    /**
     * @param Router $router
     * @param ResponseHandler $responseHandler
     * @param Messaging $messaging
     */
    public function __construct(Router $router, ResponseHandler $responseHandler, Messaging $messaging)
    {
        $this->router = $router;
        $this->responseHandler = $responseHandler;
        $this->messaging = $messaging;
    }

    /**
     * @param Request $request
     * @return HandledResponse
     */
    public function run(Request $request)
    {
        try {
            $response = $this->router->route($request);
            return $this->responseHandler->handle($response);
        } catch (\Exception $e) {
            $this->messaging->error($e);
            return $this->responseHandler->handle(Response::redirectResponse('/'));
        }
    }

}