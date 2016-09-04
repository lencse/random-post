<?php

namespace Lencse\Application;


class MessageTest extends \PHPUnit_Framework_TestCase
{

    public function testMessage()
    {
        $msg = new Message('Message', 'Type');
        $this->assertEquals('Message', $msg->getMessage());
        $this->assertEquals('Type', $msg->getType());
    }

}