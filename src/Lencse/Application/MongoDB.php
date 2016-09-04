<?php

namespace Lencse\Application;

use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;
use MongoDB\Driver\BulkWrite;

class MongoDB
{

    /**
     * @var string
     */
    private $collection;

    /**
     * @var Manager
     */
    private $manager;

    /**
     * @param $connectionString
     * @param $collection
     */
    public function __construct($connectionString, $collection)
    {
        $this->manager = new Manager($connectionString);
        $this->collection = $collection;
    }

    /**
     * @param array $options
     * @return \Generator
     */
    public function query(array $options)
    {
        $query = new Query([], $options);
        $cursor = $this->manager->executeQuery($this->collection, $query);
        foreach ($cursor as $document) {
            yield $document;
        }
    }

    /**
     * @param $data
     */
    public function insert($data)
    {
        $bulk = new BulkWrite();
        $bulk->insert($data);
        $this->manager->executeBulkWrite($this->collection, $bulk);
    }

}