<?php

namespace Lencse\Application;


class TemplatingTest extends \PHPUnit_Framework_TestCase
{

    public function testRender()
    {
        $templating = new Templating();
        $html = $templating->render('main');
        $this->assertContains('View: main', $html);
        $this->assertStringStartsWith('<!doctype html>', $html);
    }

    public function testMissingView()
    {
        $templating = new Templating();
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
        $templating = new Templating();
        try {
            $templating->render('invalid/view');
        }
        catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('InvalidArgumentException not thrown');
    }

}