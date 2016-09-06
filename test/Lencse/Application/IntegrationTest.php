<?php

namespace Lencse\Application;


class IntegrationTest extends \PHPUnit_Framework_TestCase
{

    public function testApp()
    {
        $config = require __DIR__ . '/../../config-test.php';
        $dic = new DIContainer($config);
        $app = new Application($dic->getRouter(), $dic->getMessaging());

        $mainRequest = $this->createMock(Request::class);
        $mainRequest->method('getUri')->willReturn('/');
        $mainRequest->method('getMethod')->willReturn('GET');
        $mainResponse = $app->run($mainRequest);
        $this->assertStringStartsWith('<!doctype html>', $mainResponse->getOutput());

        $token = $dic->getSession()->get(Security::SESSION_KEY);

        $newRequest = $this->createMock(Request::class);
        $newRequest->method('getUri')->willReturn('/new');
        $newRequest->method('getMethod')->willReturn('POST');
        $newRequest->method('getPostValues')->willReturn(['csrfToken' => $token]);
        $newResponse = $app->run($newRequest);
        $this->assertInstanceOf(RedirectResponse::class, $newResponse);
        $this->assertGreaterThan(0, count($dic->getPostRepository()->getAll()));


    }

}