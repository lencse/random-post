<?php

namespace Lencse\Application;


class ControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testShowMainPage()
    {
        $controller = $this->createController();
        $response = $controller->showMainPage();
        $this->assertEquals('main', $response->getView());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testShowNotFoundPage()
    {
        $controller = $this->createController();
        $response = $controller->showNotFoundPage();
        $this->assertEquals('404', $response->getView());
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testShowBadRequestPage()
    {
        $controller = $this->createController();
        $response = $controller->showBadRequestPage();
        $this->assertEquals('400', $response->getView());
        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testCreateNewPost()
    {
        $controller = $this->createController();
        $response = $controller->createNewPost();
        $this->assertEquals('/', $response->getRedirect());
    }

    /**
     * @return Controller
     */
    private function createController()
    {
        $reader = $this->createMock(MessageReader::class);
        $reader->method('hasMessage')->willReturn(true);
        $reader->method('readAndDeleteMessage')->willReturn(new Message('Message', 'message'));
        $writer = $this->createMock(MessageWriter::class);
        $postRepository = new PostRepository(new DemoDB(), $writer);
        $controller = new Controller($postRepository, $reader);
        return $controller;
    }

}