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

    public function send()
    {
        header(sprintf('HTTP/1.1 %d %s', $this->statusCode, self::$messages[$this->statusCode]));
        header('Content-Type: text/html; charset=utf-8');
        echo $this->html;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

}