<?php

namespace Lencse\Application;


class Messaging
{

    const SESSION_KEY = 'post-message';

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @param $text string
     */
    public function msg($text)
    {
        $msg = new Message($text, 'message');
        $this->session->set(self::SESSION_KEY, $msg);
    }

    /**
     * @param \Exception $exception
     */
    public function error(\Exception $exception)
    {
        $msg = new Message($exception->getMessage(), 'error');
        $this->session->set(self::SESSION_KEY, $msg);
    }

    /**
     * @return boolean
     */
    public function hasMessage()
    {
        return $this->session->has(self::SESSION_KEY);
    }

    /**
     * @return Message
     */
    public function readAndDeleteMessage()
    {
        $msg = $this->session->get(self::SESSION_KEY);
        $this->session->clear();

        return $msg;
    }

}