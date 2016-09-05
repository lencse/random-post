<?php

namespace Lencse\Application;


class RouterTest extends \PHPUnit_Framework_TestCase
{

    public function testMainPage()
    {
        $controller = $this->createMock(Controller::class);
        $controller->method('showMainPage')->willReturn(1);
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        $request->method('getMethod')->willReturn('GET');
        $router = new Router($controller);
        $this->assertEquals(1, $router->route($request));
    }

    public function testNewPost()
    {
        $controller = $this->createMock(Controller::class);
        $controller->method('createNewPost')->willReturn(1);
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/new');
        $request->method('getMethod')->willReturn('POST');
        $router = new Router($controller);
        $this->assertEquals(1, $router->route($request));
    }

    public function test404()
    {
        $controller = $this->createMock(Controller::class);
        $controller->method('showNotFoundPage')->willReturn(404);
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/non-existent');
        $request->method('getMethod')->willReturn('GET');
        $router = new Router($controller);
        $this->assertEquals(404, $router->route($request));
    }

    public function testBadRequestForMainPage()
    {
        $controller = $this->createMock(Controller::class);
        $controller->method('showNotAllowedPage')->willReturn(405);
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        $request->method('getMethod')->willReturn('POST');
        $router = new Router($controller);
        $this->assertEquals(405, $router->route($request));
    }

    public function testBadRequestForNewPost()
    {
        $controller = $this->createMock(Controller::class);
        $controller->method('showNotAllowedPage')->willReturn(405);
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/new');
        $request->method('getMethod')->willReturn('GET');
        $router = new Router($controller);
        $this->assertEquals(405, $router->route($request));
    }

}