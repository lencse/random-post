<?php

namespace Lencse\Application;


use Lencse\Application\InMemorySession;
use Lencse\Application\Security;

class SecurityTest extends \PHPUnit_Framework_TestCase
{

    public function testGetCsrfToken()
    {
        $session = new InMemorySession();
        $security = new Security($session);
        $this->assertFalse($session->has(Security::SESSION_KEY));
        $token = $security->getCsrfToken();
        $this->assertEquals($session->get(Security::SESSION_KEY), $token);
    }

    public function testValidateCsrfToken()
    {
        $session = new InMemorySession();
        $security = new Security($session);
        $token = $security->getCsrfToken();
        $this->assertTrue($security->validateCsrfToken($token));
        $this->assertFalse($security->validateCsrfToken('TOKEN'));
    }

}