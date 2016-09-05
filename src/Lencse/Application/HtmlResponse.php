<?php

namespace Lencse\Application;


class HtmlResponse implements Response
{

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $html;

    /**
     * @var string
     */
    private static $messages = [
        200 => 'OK',
        201 => 'Created',
        404 => 'Not Found',
        400 => 'Bad Request',
        405 => 'Method Not Allowed',
    ];

    /**
     * @param int
     * @param string $html
     */
    public function __construct($statusCode, $html)
    {
        $this->statusCode = $statusCode;
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getHeaders()
    {
        return [
            sprintf('HTTP/1.1 %d %s', $this->statusCode, self::$messages[$this->statusCode]),
            'Content-Type: text/html; charset=utf-8',
        ];
    }

    /**
     * @return bool
     */
    public function hasOutput()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->html;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

}