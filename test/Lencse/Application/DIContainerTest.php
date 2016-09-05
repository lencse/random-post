<?php

namespace Lencse\Application;


class DIContainerTest extends \PHPUnit_Framework_TestCase
{

    public function testGetRouter()
    {
        $dic = new DIContainer($this->getConfig());
        $this->assertInstanceOf(Router::class, $dic->getRouter());
    }

    public function testGetTemplating()
    {
        $dic = new DIContainer($this->getConfig());
        $this->assertInstanceOf(Templating::class, $dic->getTemplating());
    }

    /**
     * @return array
     */
    private function getConfig()
    {
        return require __DIR__ . '/../../config-test.php';
    }
}