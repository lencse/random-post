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

    public function send()
    {
        header(sprintf('Location: %s', $this->redirectTo));
    }

    /**
     * @return string
     */
    public function getRedirectTo()
    {
        return $this->redirectTo;
    }

}