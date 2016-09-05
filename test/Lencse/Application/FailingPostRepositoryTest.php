<?php

namespace Lencse\Application;


class FailingPostRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testSave()
    {
        $repo = new FailingPostRepository(new DemoDB(), $this->createMock(Messaging::class));
        try {
            $repo->save(new Post('Author', 'Title', new \DateTime()));
        }
        catch (\Exception $e) {
            return;
        }

        $this->fail('Exception not thrown');
    }
}