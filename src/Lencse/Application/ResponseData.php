<?php

namespace Lencse\Application;


class ResponseData
{

    /**
     * @var Post[]
     */
    private $posts = [];

    /**
     * @return Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param Post[] $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

}