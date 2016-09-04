<?php

namespace Lencse\Application;


class HandledResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testFields()
    {
        $response = new HandledResponse(['header1', 'header2'], '<h1>Title</h1>');
        $this->assertEquals(['header1', 'header2'], $response->getHeaders());
        $this->assertEquals('<h1>Title</h1>', $response->getHtml());
    }

}