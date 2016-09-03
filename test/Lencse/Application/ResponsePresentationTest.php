<?php

namespace Lencse\Application;


class ResponsePresentationTest extends \PHPUnit_Framework_TestCase
{

    public function testFields()
    {
        $responsePresentation = new ResponsePresentation(['header1', 'header2'], '<h1>Title</h1>');
        $this->assertEquals(['header1', 'header2'], $responsePresentation->getHeaders());
        $this->assertEquals('<h1>Title</h1>', $responsePresentation->getHtml());
    }

}