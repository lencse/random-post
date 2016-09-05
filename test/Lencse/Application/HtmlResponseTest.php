<?php

namespace Lencse\Application;


class HtmlResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testResponse()
    {
        $response = new HtmlResponse(200, 'html');
        $this->assertEquals(['HTTP/1.1 200 OK', 'Content-Type: text/html; charset=utf-8'], $response->getHeaders());
        $this->assertTrue($response->hasOutput());
        $this->assertEquals('html', $response->getOutput());
    }

}