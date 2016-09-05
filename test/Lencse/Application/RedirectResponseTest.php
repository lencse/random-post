<?php

namespace Lencse\Application;


class RedirectResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testRedirect()
    {
        $response = new RedirectResponse('/');
        $this->assertEquals(['Location: /'], $response->getHeaders());
        $this->assertFalse($response->hasOutput());
        try {
            $response->getOutput();
        } catch (\RuntimeException $e) {
            return;
        }
        $this->fail('Exception not thrown');
    }

}