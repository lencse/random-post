<?php

namespace Lencse\Application;


class MongoDBTest extends \PHPUnit_Framework_TestCase
{

    public function testQuery()
    {
        $db = new MongoDB('mongodb://localhost:27017/test', 'test.unittest');
        $db->insert(['test' => 1]);
        foreach ($db->query([]) as $doc) {
            $this->assertNotNull(1, $doc->test);
        }
    }

}