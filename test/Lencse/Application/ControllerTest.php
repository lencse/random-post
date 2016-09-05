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
        $security = $this->createMock(Security::class);
        $security->method('getCsrfToken')->willReturn('RANDOM');
        $security->method('validateCsrfToken')->willReturn(true);
        $controller = $this->createController($security);
        $request = $this->createMock(Request::class);
        $request->method('getPostValues')->willReturn(['csrfToken' => 'RANDOM']);
        $response = $controller->createNewPost($request);
        $this->assertEquals('/', $response->getRedirect());
    }

    public function testCreateNewPostWithBadCsrf()
    {
        $security = $this->createMock(Security::class);
        $security->method('getCsrfToken')->willReturn('RANDOM');
        $security->method('validateCsrfToken')->willReturn(false);
        $controller = $this->createController($security);
        $request = $this->createMock(Request::class);
        $request->method('getPostValues')->willReturn(['csrfToken' => 'RANDOM']);
        $response = $controller->createNewPost($request);
        $this->assertEquals(400, $response->getStatusCode());
    }

    /**
     * @return Controller
     */
    private function createController(Security $security = null)
    {
        $reader = $this->createMock(MessageReader::class);
        $reader->method('hasMessage')->willReturn(true);
        $reader->method('readAndDeleteMessage')->willReturn(new Message('Message', 'message'));
        $writer = $this->createMock(MessageWriter::class);
        $postRepository = new PostRepository(new DemoDB(), $writer);
        if (!$security) {
            $security = $this->createMock(Security::class);
            $security->method('getCsrfToken')->willReturn('RANDOM');
        }
        $controller = new Controller($postRepository, $reader, $security);
        return $controller;
    }

}