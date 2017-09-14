<?php

namespace Brash\Skeleton;

use DI\Bridge\Slim\App;

interface ServiceProviderInterface
{
    public function dependencies(App $app): App;
    public function routes(App $app): App;
}
