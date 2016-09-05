<?php

namespace Lencse\Application;


class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    public function testRun()
    {
        $request = $this->getRequest();
        $router = $this->createMock(Router::class);
        $response = new HtmlResponse(200, 'html');
        $router->method('route')->willReturn($response);
        $messaging = $this->createMock(MessageWriter::class);

        $app = new Application($router, $messaging);
        $this->assertEquals($response, $response = $app->run($request));
    }

    public function testError()
    {
        $request = $this->getRequest();
        $router = $this->createMock(Router::class);
        $router->method('route')->willThrowException(new \Exception('Test Exception'));
        $messaging = $this->createMock(MessageWriter::class);
        $app = new Application($router, $messaging);
        $this->assertInstanceOf(RedirectResponse::class, $app->run($request));
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getRequest()
    {
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        return $request;
    }

}