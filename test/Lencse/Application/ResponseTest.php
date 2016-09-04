<?php

namespace Lencse\Application;


class ResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testFields()
    {
        $data = new ResponseData();
        $response = Response::htmlResponse('view', 200, $data);
        $this->assertEquals('view', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($data, $response->getData());
    }

}