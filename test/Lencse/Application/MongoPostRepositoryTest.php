<?php

namespace Lencse\Application;


class MongoPostRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testSave()
    {
        $db = new DemoDB();
//        var_dump($db);
        $repo = new MongoPostRepository($db, new Messaging());
        $repo->save(new Post('Author', 'Title', new \DateTime()));
//        var_dump($db);
        $this->assertGreaterThan(0, count($repo->getAll()));
    }

}