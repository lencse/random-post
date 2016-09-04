<?php

namespace Lencse\Application;


class Message
{



    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $type;

    /**
     * @param string $message
     * @param string $type
     */
    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

}