<?php

namespace Lencse\Application;


class InMemorySession implements SessionInterface
{

    private $data = [];

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->data[$key]);
    }

    public function get($key)
    {
        if (!$this->has($key)) {
            throw new \InvalidArgumentException('Key "%s" ot found in session', $key);
        }

        return $this->data[$key];
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param $key string
     */
    public function unsetField($key)
    {
        unset($this->data[$key]);
    }


}