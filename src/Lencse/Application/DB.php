<?php

namespace Lencse\Application;


interface DB
{

    /**
     * @param array $options
     * @return \Generator
     */
    public function query(array $options);

    /**
     * @param $data
     */
    public function insert($data);

}