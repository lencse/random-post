<?php

namespace Lencse\Application;


class DemoPostRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAll()
    {
        $repo = new DemoPostRepository();
        $this->assertEquals(10, count($repo->getAll()));
    }

    public function testSave()
    {
        $repo = new DemoPostRepository();
        $repo->save(new Post('Author', 'Title', new \DateTime()));
        $this->assertEquals(11, count($repo->getAll()));
    }

}