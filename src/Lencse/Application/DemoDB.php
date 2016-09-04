<?php

namespace Lencse\Application;


class DemoDB implements DB
{

    /**
     * @var array
     */
    private $docs = [];

    /**
     * @param array $options
     * @return \Generator
     */
    public function query(array $options)
    {
        foreach ($this->docs as $document) {
            yield (object) $document;
        }
    }

    /**
     * @param $data
     */
    public function insert($data)
    {
        $this->docs[] = $data;
    }

}