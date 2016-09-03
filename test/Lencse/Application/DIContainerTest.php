<?php

namespace Lencse\Application;


class DIContainerTest extends \PHPUnit_Framework_TestCase
{

    public function testGetRouter()
    {
        $config = require __DIR__ . '/../../config-test.php';
        $dic = new DIContainer($config);
        $this->assertInstanceOf(Router::class, $dic->getRouter());
    }

    public function testGetResponseHandler()
    {
        $config = require __DIR__ . '/../../config-test.php';
        $dic = new DIContainer($config);
        $this->assertInstanceOf(ResponseHandler::class, $dic->getResponseHandler());
    }

    public function testGetTemplating()
    {
        $config = require __DIR__ . '/../../config-test.php';
        $dic = new DIContainer($config);
        $this->assertInstanceOf(Templating::class, $dic->getTemplating());
    }

}