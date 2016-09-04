<?php

namespace Lencse\Application;


class MongoPostRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testSave()
    {
        $db = new MongoDB('mongodb://localhost:27017/testposts', 'test.testposts');
        $repo = new MongoPostRepository($db);
        $repo->save(new Post('Author', 'Title', new \DateTime()));
//        $this->assertGreaterThan(0, count($repo->getAll()));
    }

}