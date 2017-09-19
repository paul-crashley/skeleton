<?php

namespace Skeleton;

use DI\Bridge\Slim\App;

class Bootstrap
{
    public static function build(App $app): App
    {
        $providers = $app->getContainer()->get('providers');

        foreach ($providers as $className) {
            $provider = self::initProvider($className);
            $provider->dependencies($app);
            $provider->routes($app);
        }

        return $app;
    }

    private static function initProvider(string $className): ServiceProviderInterface
    {
        if (!class_exists($className)) {
            throw new \LogicException("Class {$className} does not exist as a service provider");
        }

        $provider = new $className;

        if (!$provider instanceof ServiceProviderInterface) {
            throw new \LogicException("Class {$className} does not implement ServiceProviderInterface");
        }

        return $provider;
    }
}
