<?php

namespace Lencse\Application;


/**
 * @SuppressWarnings(PHPMD.Superglobals)
 */
class Session implements SessionInterface
{

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public function get($key)
    {
        if (!$this->has($key)) {
            throw new \InvalidArgumentException('Key "%s" ot found in session', $key);
        }

        return $_SESSION[$key];
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key string
     */
    public function unsetField($key)
    {
        unset($_SESSION[$key]);
    }


}