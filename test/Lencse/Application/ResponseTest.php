<?php

namespace Lencse\Application;


class ResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testFields()
    {
        $response = new Response('view', 200);
        $this->assertEquals('view', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
    }

}