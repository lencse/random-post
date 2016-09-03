<?php

namespace Lencse\Application;


class TemplatingTest extends \PHPUnit_Framework_TestCase
{

    public function testRender()
    {
        $templating = new Templating(__DIR__ . '/views');
        $html = $templating->render('main', new ResponseData());
        $this->assertContains('Posztok', $html);
        $this->assertStringStartsWith('<!doctype html>', $html);
    }

    public function testMissingView()
    {
        $templating = new Templating(__DIR__ . '/views');
        try {
            $templating->render('invalid');
        }
        catch (\RuntimeException $e) {
            return;
        }
        $this->fail('RuntimeException not thrown');
    }

    public function testInvalidView()
    {
        $templating = new Templating(__DIR__ . '/views');
        try {
            $templating->render('invalid/view');
        }
        catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('InvalidArgumentException not thrown');
    }

    public function testEscaping()
    {
        ob_start();
        Templating::esc('&');
        $this->assertEquals('&amp;', ob_get_clean());
    }

}