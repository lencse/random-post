<?php

namespace Lencse\Application;


interface MessageReader
{

    /**
     * @return boolean
     */
    public function hasMessage();

    /**
     * @return Message
     */
    public function readAndDeleteMessage();

}