<?php

namespace Lencse\Application;


class RiskyPostRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testSave()
    {
        $messaging = $this->createMock(MessageWriter::class);
        $db = new DemoDB();
        $repo = new RiskyPostRepository($db, $messaging);
        $errors = 0;
        for ($i = 0; $i < 100; ++$i) {
            try {
                $repo->save(new Post('Author', 'Title', new \DateTime()));
            }
            catch (\Exception $e) {
                ++$errors;
            }
        }
        $this->assertGreaterThan(0, count($repo->getAll()));
        $this->assertGreaterThan(0, $errors);
    }

}