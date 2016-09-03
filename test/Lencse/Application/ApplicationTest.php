<?php

namespace Lencse\Application;


class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    public function testRun()
    {
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        $app = new Application(new DIContainer());
        $response = $app->run($request);
        $this->assertStringStartsWith('<!doctype html>', $response->getHtml());
    }

}