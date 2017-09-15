<?php

namespace Skeleton\Tests\Unit\Skeleton;

use Skeleton\Bootstrap;
use Skeleton\ServiceProviderInterface;
use DI\Bridge\Slim\App;
use PHPUnit\Framework\TestCase;

class BootstrapTest extends TestCase
{
    public function testBootstrap()
    {
        $provider = $this->createMock(ServiceProviderInterface::class);
        $providers = [
            $provider,
            $provider
        ];

        $app = $this->createMock(App::class);

        $provider->expects($this->exactly(2))
            ->method('dependencies')
            ->with($app);

        $provider->expects($this->exactly(2))
            ->method('routes')
            ->with($app);

        $bootstrap = new Bootstrap($providers);
        $result = $bootstrap->build($app);

        $this->assertInstanceOf(App::class, $result);
    }

    public function testInvalidProvider()
    {
        $this->expectException(\TypeError::class);

        $bootstrap = new Bootstrap();
        $provider = clone $bootstrap;
        $bootstrap->addProviders([$provider]);
    }
}
