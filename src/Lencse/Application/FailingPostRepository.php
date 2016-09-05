<?php

namespace Lencse\Application;


class FailingPostRepository extends PostRepository
{

    /**
     * @param Post $post
     */
    public function save(Post $post)
    {
        throw new \RuntimeException(sprintf('Hiba történt %s cikkének mentése közben', $post->getAuthor()));
    }

}