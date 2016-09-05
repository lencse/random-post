<?php

namespace Lencse\Application;


class ResponseData
{

    /**
     * @var Post[]
     */
    private $posts = [];

    /**
     * @var Message
     */
    private $message;

    /**
     * @var string
     */
    private $csrfToken;

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

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getCsrfToken()
    {
        return $this->csrfToken;
    }

    /**
     * @param string $csrfToken
     */
    public function setCsrfToken($csrfToken)
    {
        $this->csrfToken = $csrfToken;
    }

}