<?php

namespace Lencse\Application;


class DIContainerTest extends \PHPUnit_Framework_TestCase
{

    public function testGetRouter()
    {
        $dic = new DIContainer();
        $this->assertInstanceOf(Router::class, $dic->getRouter());
    }

}