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
     * @param Router $router
     * @param ResponseHandler $responseHandler
     */
    public function __construct(Router $router, ResponseHandler $responseHandler)
    {
        $this->router = $router;
        $this->responseHandler = $responseHandler;
    }

    /**
     * @param Request $request
     * @return ResponsePresentation
     */
    public function run(Request $request)
    {
//        try {
            $response = $this->router->route($request);
            return $this->responseHandler->handle($response);
//        } catch (\Exception $e) {
//            print_r([
//                $e->getMessage(),
//                $e->getTraceAsString()
//            ]);
//        }
    }

}