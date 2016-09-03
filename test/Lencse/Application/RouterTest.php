<?php

namespace Lencse\Application;


class RouterTest extends \PHPUnit_Framework_TestCase
{

    public function testRoute()
    {
        $controller = $this->createMock(Controller::class);
        $controller->method('showMainPage')->willReturn(1);
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        $router = new Router($controller);
        $this->assertEquals(1, $router->route($request));
    }

    public function test404()
    {
        $controller = $this->createMock(Controller::class);
        $controller->method('showNotFoundPage')->willReturn(404);
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/non-existent');
        $router = new Router($controller);
        $this->assertEquals(404, $router->route($request));
    }

}