<?php

namespace Brash\Skeleton;

use DI\Bridge\Slim\App;

interface ServiceProviderInterface
{
    public function routes(App $app): App;
}
