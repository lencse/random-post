<?php

namespace Lencse\Application;


class ControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testShowMainPage()
    {
        $reader = $this->createMock(MessageReader::class);
        $reader->method('hasMessage')->willReturn(false);
        $controller = new Controller(new PostRepository(new DemoDB(), $this->createMock(MessageWriter::class)), $reader);
        $response = $controller->showMainPage();
        $this->assertEquals('main', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testShowNotFoundPage()
    {
        $reader = $this->createMock(MessageReader::class);
        $reader->method('hasMessage')->willReturn(false);
        $controller = new Controller(new PostRepository(new DemoDB(), $this->createMock(MessageWriter::class)), $reader);
        $response = $controller->showMainPage();
        $controller->showNotFoundPage();
        $this->assertEquals('main', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
    }

}