<?php

namespace Brash\Skeleton;

use DI\Bridge\Slim\App;

class Bootstrap
{
    private $providers = [];

    public function __construct(array $providers = [])
    {
        $this->addProviders($providers);
    }

    public function addProviders(array $providers)
    {
        foreach ($providers as $provider) {
            $this->addProvider($provider);
        }
    }

    public function addProvider(ServiceProviderInterface $provider)
    {
        $this->providers[] = $provider;
    }

    public function build(App $app): App
    {
        foreach ($this->providers as $provider) {
            $provider->dependencies($app);
            $provider->routes($app);
        }

        return $app;
    }
}
