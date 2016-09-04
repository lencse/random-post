<?php

namespace Lencse\Application;


class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    public function testRun()
    {
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        $router = $this->createMock(Router::class);
        $router->method('route')->willReturn(Response::htmlResponse('main', 200));
        $handler = $this->createMock(ResponseHandler::class);
        $handler->method('handle')->willReturn(new HandledResponse(['header'], 'html'));
        $messaging = $this->createMock(MessageWriter::class);

        $app = new Application($router, $handler, $messaging);
        $response = $app->run($request);
        $this->assertEquals('html', $response->getHtml());
    }

    public function testError()
    {
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        $router = $this->createMock(Router::class);
        $router->method('route')->willThrowException(new \Exception('Test Exception'));
        $messaging = $this->createMock(MessageWriter::class);
        $app = new Application($router, new ResponseHandler($this->createMock(Templating::class)), $messaging);
        $response = $app->run($request);
        $this->assertEquals(['HTTP/1.1 500 Internal Server Error', 'Location: /'], $response->getHeaders());
        $this->assertEquals('', $response->getHtml());
    }

}