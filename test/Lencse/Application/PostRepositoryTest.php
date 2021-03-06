<?php

namespace Lencse\Application;


class PostRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testSave()
    {
        $messaging = $this->createMock(MessageWriter::class);
        $db = new DemoDB();
        $repo = new PostRepository($db, $messaging);
        $repo->save(new Post('Author', 'Title', new \DateTime()));
        $this->assertGreaterThan(0, count($repo->getAll()));
    }

}