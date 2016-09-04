<?php

namespace Lencse\Application;


class RiskyPostRepository extends PostRepository
{

    public function save(Post $post)
    {
        if (rand(0, 1) == 1) {
            throw new \RuntimeException(sprintf('Hiba történt %s cikkének mentése közben', $post->getAuthor()));
        }
        parent::save($post);
    }

}