<?php

namespace Lencse\Application;


class Router
{

    /**
     * @var Controller
     */
    private $controller;

    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    /**
     * @param Request $request
     */
    public function route(Request $request)
    {
        if ($request->getUri() == '/') {
            return $this->controller->showMainPage();
        }

        return $this->controller->showNotFoundPage();
    }

}