<?php

namespace Lencse\Application;


class ResponseHandlerTest extends \PHPUnit_Framework_TestCase
{

    public function testHandle()
    {
        $handler = new ResponseHandler(new Templating(__DIR__ . '/views'));
        $response = Response::htmlResponse('main', 200, new ResponseData());
        $result = $handler->handle($response);
        $this->assertEquals(['HTTP/1.1 200 OK', 'Content-Type: text/html; charset=utf-8'], $result->getHeaders());
        $this->assertStringStartsWith('<!doctype html>', $result->getHtml());
    }

}