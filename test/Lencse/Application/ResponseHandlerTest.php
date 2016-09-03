<?php

namespace Lencse\Application;


class ResponseHandlerTest extends \PHPUnit_Framework_TestCase
{

    public function testHandle()
    {
        $handler = new ResponseHandler(new Templating());
        $response = new Response('main', 200);
        $result = $handler->handle($response);
        $this->assertEquals(['HTTP/1.1 200 OK', 'Content-Type: text/html; charset=utf-8'], $result->getHeaders());
        $this->assertStringStartsWith('<!doctype html>', $result->getHtml());
    }

}