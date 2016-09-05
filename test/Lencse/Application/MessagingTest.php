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

    public function testException()
    {
        $session = new InMemorySession();
        $session->set(Messaging::SESSION_KEY, 'ERROR');
        $messaging = new Messaging($session, new DemoDB(), ['test@test.hu']);
        try {
            $messaging->readAndDeleteMessage();
        } catch (\RuntimeException $e) {
            return;
        }
        $this->fail('RuntimeException not thrown');
    }

    /**
     * @return Messaging
     */
    private function createMessaging()
    {
        return new Messaging(new InMemorySession(), new DemoDB(), ['test@test.hu']);
    }

}