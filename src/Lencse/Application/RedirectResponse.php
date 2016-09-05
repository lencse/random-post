<?php

namespace Lencse\Application;


class RedirectResponse implements Response
{

    /**
     * @var string
     */
    private $redirectTo;

    /**
     * @param string $redirectTo
     */
    public function __construct($redirectTo)
    {
        $this->redirectTo = $redirectTo;
    }

    /**
     * @return string
     */
    public function getHeaders()
    {
        return [sprintf('Location: %s', $this->redirectTo)];
    }

    /**
     * @return bool
     */
    public function hasOutput()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        throw new \RuntimeException('No output for redirect response');
    }

    /**
     * @return string
     */
    public function getRedirectTo()
    {
        return $this->redirectTo;
    }

}