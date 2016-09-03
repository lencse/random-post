<?php

namespace Lencse\Controller;


class ControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testShowMainPage()
    {
        $controller = new Controller();
        ob_start();
        $controller->showMainPage();
        $this->assertEquals('<h1>I ❤ Orbán Ráhel</h1>', ob_get_clean());
    }

    public function testShowNotFoundPage()
    {
        $controller = new Controller();
        ob_start();
        $controller->showNotFoundPage();
        $this->assertEquals('<h1>404 NOT FOUND</h1>', ob_get_clean());
    }

}