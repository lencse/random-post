<?php

namespace Lencse\Application;


class HandledResponse
{

    /**
     * @var string[]
     */
    private $headers;

    /**
     * @var string
     */
    private $html;

    /**
     * @param \string[] $headers
     * @param string $html
     */
    public function __construct(array $headers, $html)
    {
        $this->headers = $headers;
        $this->html = $html;
    }

    /**
     * @return \string[]
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

}