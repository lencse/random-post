<?php

namespace Lencse\Application;


class MessagingTest extends \PHPUnit_Framework_TestCase
{

    public function testMsg()
    {
        $msg = $this->createMessaging();
        $this->assertFalse($msg->hasMessage());
        $msg->msg('test');
        $this->assertTrue($msg->hasMessage());
        $message = $msg->readAndDeleteMessage();
        $this->assertEquals('test', $message->getMessage());
        $this->assertEquals('message', $message->getType());
    }

    public function testError()
    {
        $msg = $this->createMessaging();
        $msg->error(new \Exception('test'));
        $message = $msg->readAndDeleteMessage();
        $this->assertEquals('test', $message->getMessage());
        $this->assertEquals('error', $message->getType());

    }

    /**
     * @return Messaging
     */
    private function createMessaging()
    {
        return new Messaging(new InMemorySession(), new DummyMailer(), ['test@test.hu']);
    }

}