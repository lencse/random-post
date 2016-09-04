<?php

namespace Lencse\Application;


class MongoPostRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testSave()
    {
        $db = new DemoDB();
        $repo = new PostRepository($db, new Messaging(new InMemorySession()));
        $repo->save(new Post('Author', 'Title', new \DateTime()));
        $this->assertGreaterThan(0, count($repo->getAll()));
    }

}