<?php

namespace Lencse\Application;


class ControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testShowMainPage()
    {
        $controller = new Controller(new DemoPostRepository());
        $response = $controller->showMainPage();
        $this->assertEquals('main', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testShowNotFoundPage()
    {
        $controller = new Controller(new DemoPostRepository());
        $response = $controller->showMainPage();
        $controller->showNotFoundPage();
        $this->assertEquals('main', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
    }

}