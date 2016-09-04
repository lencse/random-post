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
            if ($request->getMethod() == 'GET') {
                return $this->controller->showMainPage();
            }
            return $this->controller->showBadRequestPage();
        }
        if ($request->getUri() == '/new') {
            if ($request->getMethod() == 'POST') {
                return $this->controller->createNewPost();
            }
            return $this->controller->showBadRequestPage();
        }

        return $this->controller->showNotFoundPage();
    }

}