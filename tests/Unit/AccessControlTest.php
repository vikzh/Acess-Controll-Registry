<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\AccessControlRegistry;
use App\User;

class AccessControlTest extends TestCase
{
    protected $restrictedRoutesRegistry;

    public function setUp()
    {
        $this->restrictedRoutesRegistry = new AccessControlRegistry();
    }

    public function testGetAccess()
    {
        $this->assertTrue(
            $this->restrictedRoutesRegistry->setRequests(['SomeClass', 'someMethod1'])->hasAccessForUserType(USER::VISITOR)
        );

        $this->assertFalse(
            $this->restrictedRoutesRegistry->setRequests(['SomeClass', 'anotherMethod1'])->hasAccessForUserType(USER::VISITOR)
        );

        $this->assertFalse(
            $this->restrictedRoutesRegistry->setRequests(['AnotherClass', 'anotherMethod1'])->hasAccessForUserType(USER::VISITOR)
        );
    }
}