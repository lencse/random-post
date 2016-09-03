<?php

namespace Lencse\Application;


interface PostRepository
{

    /**
     * @return Post[]
     */
    public function getAll();

    /**
     * @param Post $post
     */
    public function save(Post $post);

}