<?php

namespace Skeleton\Auth\Test;

use PHPUnit\Framework\TestCase;
use Skeleton\Auth\Jwt\JwtValue;

class JwtValueTest extends TestCase
{
    public function testJwtValue()
    {
        $issuer = 'http://localhoest';
        $value = new JwtValue($issuer);

        $this->assertEquals($issuer, $value->getIssuer());
        $this->assertTrue(is_string($value->getJti()));
        $this->assertNotNull($value->getIssuedAt());
        $this->assertTrue(is_integer($value->getIssuedAt()));
        $this->assertNotNull($value->getNotBefore());
        $this->assertTrue(is_integer($value->getNotBefore()));
        $this->assertGreaterThanOrEqual($value->getIssuedAt(), $value->getNotBefore());
        $this->assertNotNull($value->getExpire());
        $this->assertTrue(is_integer($value->getExpire()));
        $this->assertGreaterThan($value->getIssuedAt(), $value->getExpire());
        $this->assertGreaterThan($value->getNotBefore(), $value->getExpire());
        $this->assertTrue(is_array($value->getData()));
    }

    public function testJwtValueRemembered()
    {
        $issuer = 'http://localhost';
        $jwt = new JwtValue($issuer);
        $jwt->setRemembered();

        $data = $jwt->getData();

        $this->assertEquals(true, $data['remembered']);
    }

    public function testJwtIdentifier()
    {
        $issuer = 'http://localhost';
        $jwt = new JwtValue($issuer);
        $jwt->setIdentifier(1);

        $data = $jwt->getData();

        $this->assertEquals(1, $data['identifier']);
    }

    public function testJwtSetData()
    {
        $issuer = 'http://localhost';
        $jwt = new JwtValue($issuer);
        $jwt->setData([
            'test' => 'succeeded'
        ]);

        $data = $jwt->getData();

        $this->assertArrayHasKey('test', $data);
        $this->assertEquals('succeeded', $data['test']);
    }

    public function testJwtValueNegativeTtl()
    {
        $this->expectException(\InvalidArgumentException::class);

        $issuer = 'http://localhost';
        new JwtValue($issuer, -20);
    }

    public function testJwtReservedDataKey()
    {
        $this->expectException(\InvalidArgumentException::class);

        $issuer = 'http://localhost';
        $jwt = new JwtValue($issuer);
        $jwt->addData('identifier', 1);
    }
}
