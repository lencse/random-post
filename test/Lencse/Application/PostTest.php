<?php

namespace Lencse\Application;


class PostTest extends \PHPUnit_Framework_TestCase
{

    public function testCreation()
    {
        $post = new Post('Author', 'Title');
        $this->assertEquals('Author', $post->getAuthor());
        $this->assertEquals('Title', $post->getTitle());
        $current = new \DateTime();
        $this->assertLessThanOrEqual(1, abs($current->getTimestamp() - $post->getDate()->getTimestamp()));
    }

    public function testRandom()
    {
        $post = Post::createRandom();
        $this->assertGreaterThan(3, strlen($post->getAuthor()));
        $this->assertGreaterThan(3, strlen($post->getTitle()));
    }

}