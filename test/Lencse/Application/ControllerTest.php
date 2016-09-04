<?php

namespace Lencse\Application;


class ControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testShowMainPage()
    {
        $messaging = new Messaging(new InMemorySession());
        $controller = new Controller(new PostRepository(new DemoDB(), $messaging), $messaging);
        $response = $controller->showMainPage();
        $this->assertEquals('main', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testShowNotFoundPage()
    {
        $messaging = new Messaging(new InMemorySession());
        $controller = new Controller(new PostRepository(new DemoDB(), $messaging), $messaging);
        $response = $controller->showMainPage();
        $controller->showNotFoundPage();
        $this->assertEquals('main', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
    }

}