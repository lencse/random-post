<?php

namespace Lencse\Application;


class ControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testShowMainPage()
    {
        $controller = $this->createController();
        $response = $controller->showMainPage();
        $this->assertInstanceOf(HtmlResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testShowNotFoundPage()
    {
        $controller = $this->createController();
        $response = $controller->showNotFoundPage();
        $this->assertInstanceOf(HtmlResponse::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testShowBadRequestPage()
    {
        $controller = $this->createController();
        $response = $controller->showBadRequestPage();
        $this->assertInstanceOf(HtmlResponse::class, $response);
        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testShowNotAllowedPage()
    {
        $controller = $this->createController();
        $response = $controller->showNotAllowedPage();
        $this->assertInstanceOf(HtmlResponse::class, $response);
        $this->assertEquals(405, $response->getStatusCode());
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
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('/', $response->getRedirectTo());
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
        $this->assertInstanceOf(HtmlResponse::class, $response);
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
        $templating = $this->createMock(Templating::class);
        $controller = new Controller($postRepository, $reader, $security, $templating);
        return $controller;
    }

}