<?php

namespace Lencse\Application;


class ResponseHandlerTest extends \PHPUnit_Framework_TestCase
{

    public function testHandle()
    {
        $handler = new ResponseHandler();
        $response = new Response('view', 200);
        $result = $handler->handle($response);
        $this->assertEquals(['HTTP/1.1 200 OK', 'Content-Type: text/html; charset=utf-8'], $result->getHeaders());
        $this->assertEquals('<p>View: view</p>', $result->getHtml());
    }

}