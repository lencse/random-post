<?php

namespace Lencse\Application;


use Lencse\Framework\DIContainer;
use Lencse\Framework\Request;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    public function testRun()
    {
        $request = $this->createMock(Request::class);
        $request->method('getUri')->willReturn('/');
        $app = new Application(new DIContainer());
        ob_start();
        $app->run($request);
        $this->assertEquals('<h1>I ❤ Orbán Ráhel</h1>', ob_get_clean());
    }

}