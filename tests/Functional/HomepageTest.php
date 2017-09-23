<?php

namespace Skeleton\Tests\Functional;

class HomepageTest extends TestCase
{
    public function testGetHomePage()
    {
        $response = $this->runApp('GET', '/');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Hello', (string)$response->getBody());
    }
}
