<?php

namespace Skeleton;

use DI\Bridge\Slim\App;

interface ServiceProviderInterface
{
    public function dependencies(): array;
    public function middleware(App $app): App;
    public function routes(App $app): App;
}
