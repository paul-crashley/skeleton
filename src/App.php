<?php

namespace Skeleton;

use DI\ContainerBuilder;

class App extends \DI\Bridge\Slim\App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $config = include __DIR__ . '/../config/config.php';

        $builder->addDefinitions($config);
    }
}
