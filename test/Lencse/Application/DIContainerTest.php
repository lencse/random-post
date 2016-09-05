<?php

namespace Lencse\Application;


class DIContainerTest extends \PHPUnit_Framework_TestCase
{

    public function testGetRouter()
    {
        $dic = new DIContainer($this->getConfig());
        $this->assertInstanceOf(Router::class, $dic->getRouter());
    }

    public function testGetMessaging()
    {
        $dic = new DIContainer($this->getConfig());
        $this->assertInstanceOf(Messaging::class, $dic->getMessaging());
    }

    public function testGetMailProcesser()
    {
        $dic = new DIContainer($this->getConfig());
        $this->assertInstanceOf(MailProcesser::class, $dic->getMailProcesser());
    }

    /**
     * @return array
     */
    private function getConfig()
    {
        return require __DIR__ . '/../../config-test.php';
    }
}