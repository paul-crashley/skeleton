<?php

namespace Skeleton;

use DI\ContainerBuilder;

class App extends \DI\Bridge\Slim\App
{
    /**
     * @var array
     */
    private $definitions = [];

    /**
     * @var array
     */
    private $providers = [];

    public function __construct(array $providers = [])
    {
        $this->providers = $providers;

        parent::__construct();

        $this->processRoutes();
    }

    protected function configureContainer(ContainerBuilder $builder)
    {
        $this->processDefinitions();

        $builder->addDefinitions($this->definitions);
    }

    private function processDefinitions()
    {
        foreach ($this->providers as $className) {
            $provider = $this->initProvider($className);
            $this->definitions = array_merge($this->definitions, $provider->dependencies());
        }
    }

    private function initProvider(string $className): ServiceProviderInterface
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

    private function processRoutes()
    {
        foreach ($this->providers as $className) {
            $provider = $this->initProvider($className);
            $provider->routes($this);
        }
    }
}
