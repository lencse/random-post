<?php

namespace Lencse\Application;


interface SessionInterface
{

    /**
     * @param $key string
     * @return boolean
     */
    public function has($key);

    /**
     * @param $key string
     * @return mixed
     */
    public function get($key);

    /**
     * @param $key string
     * @param $value
     */
    public function set($key, $value);

    /**
     * @param $key string
     */
    public function unsetField($key);

}