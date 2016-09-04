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
        $messaging = $this->createMock(Messaging::class);
        $messaging->method('hasMessage')->willReturn(false);

        $app = new Application($router, $handler, $messaging);
        $response = $app->run($request);
        $this->assertEquals('html', $response->getHtml());
    }

}