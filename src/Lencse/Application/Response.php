<?php

namespace Lencse\Application;


interface Response
{

    /**
     * @return string
     */
    public function getHeaders();

    /**
     * @return bool
     */
    public function hasOutput();

    /**
     * @return string
     */
    public function getOutput();

}