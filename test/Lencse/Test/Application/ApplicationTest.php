<?php

namespace Lencse\Test\Application;


use Lencse\Application\Application;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    public function testRun()
    {
        $app = new Application();
        ob_start();
        $this->assertEquals(0, $app->run());
        $this->assertEquals('<h1>I ❤ Orbán Ráhel</h1>', ob_get_clean());
    }

}