<?php

namespace Lencse\Application;


class RequestTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateFromGlobals() {
        $_SERVER['REQUEST_URI'] = '/test';
        $request = Request::createFromGlobals();
        $this->assertEquals('/test', $request->getUri());
        unset($_SERVER['REQUEST_URI']);
    }

}