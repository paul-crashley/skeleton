<?php

namespace Brash\Skeleton;

use DI\Bridge\Slim\App;

class Bootstrap
{
    private $providers = [
        ServiceProvider::class
    ];

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
        foreach ($this->providers as $providerClassName) {
            /** @var ServiceProviderInterface $provider */
            $provider = new $providerClassName;
            $provider->routes($app);
        }

        return $app;
    }
}
