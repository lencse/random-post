<?php

namespace Lencse\Application;


class RequestTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateFromGlobals() {
        $_SERVER['REQUEST_URI'] = '/test';
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_POST['DUMMY'] = 'X';
        $request = Request::createFromGlobals();
        $this->assertEquals('/test', $request->getUri());
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals(['DUMMY' => 'X'], $request->getPostValues());
        unset($_SERVER['REQUEST_URI']);
        unset($_SERVER['REQUEST_METHOD']);
        unset($_POST['DUMMY']);
    }

}