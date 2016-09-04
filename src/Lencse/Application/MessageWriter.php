<?php

namespace Lencse\Application;


interface MessageWriter
{

    /**
     * @param $text string
     */
    public function msg($text);

    /**
     * @param \Exception $exception
     */
    public function error(\Exception $exception);

}