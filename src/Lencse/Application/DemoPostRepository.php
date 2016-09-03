<?php

namespace Lencse\Application;


class DemoPostRepository implements PostRepository
{

    /**
     * @var Post[]
     */
    private $posts = [];

    public function __construct()
    {
        for ($i = 0; $i < 10; ++$i) {
            $this->posts[] = Post::createRandom();
        }
    }

    /**
     * @return Post[]
     */
    public function getAll()
    {
        return $this->posts;
    }

    /**
     * @param Post $post
     */
    public function save(Post $post)
    {
        $this->posts[] = $post;
    }

}