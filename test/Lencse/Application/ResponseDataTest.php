<?php

namespace Lencse\Application;


class ResponseDataTest extends \PHPUnit_Framework_TestCase
{

    public function testPosts()
    {
        $data = new ResponseData();
        $posts = [Post::createRandom(), Post::createRandom()];
        $data->setPosts($posts);
        $this->assertEquals($posts, $data->getPosts());
    }

}