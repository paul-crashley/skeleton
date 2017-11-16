<?php

namespace Skeleton\Auth\Test;

use PHPUnit\Framework\TestCase;
use Skeleton\Auth\Jwt\JwtValue;
use Skeleton\Auth\Jwt\Manager;

class JwtManagerTest extends TestCase
{
    public function testJwtCreate()
    {
        $value = new JwtValue('http://localhost');
        $manager = new Manager('12345');
        $result = $manager->create($value);

        $this->assertInstanceOf(Manager::class, $manager);
        $this->assertTrue(is_string($result));
    }

    public function testJwtDecode()
    {
        $value = new JwtValue('http://localhost');
        $manager = new Manager('12345');
        $token = $manager->create($value);
        $decoded = $manager->parse($token);

        $this->assertEquals($value->toArray(), $decoded);
    }

    public function testJwtIdentity()
    {
        $id = 1;
        $value = new JwtValue('http://localhost');
        $value->setIdentifier($id);

        $manager = new Manager('12345');
        $token = $manager->create($value);

        $this->assertEquals($id, $manager->identitity($token));
    }
}
