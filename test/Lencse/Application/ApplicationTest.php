<?php

namespace Lencse\Application;


class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    public function testRun()
    {
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        $router = $this->createMock(Router::class);
        $router->method('route')->willReturn(new Response('main', 200));
        $handler = $this->createMock(ResponseHandler::class);
        $handler->method('handle')->willReturn(new ResponsePresentation(['header'], 'html'));

        $app = new Application($router, $handler);
        $response = $app->run($request);
        $this->assertEquals('html', $response->getHtml());
    }

}