<?php

namespace Lencse\Application;


class Application
{

    /**
     * @var Router
     */
    private $router;

    /**
     * @var MessageWriter
     */
    private $messaging;

    /**
     * @param Router $router
     * @param MessageWriter $messaging
     */
    public function __construct(Router $router, MessageWriter $messaging)
    {
        $this->router = $router;
        $this->messaging = $messaging;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function run(Request $request)
    {
        try {
            return $this->router->route($request);
        } catch (\Exception $e) {
            $this->messaging->error($e);
            return new RedirectResponse('/');
        }
    }

}