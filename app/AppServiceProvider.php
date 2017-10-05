<?php

namespace App;

use App\Http\Middleware\Cors;
use DI\Bridge\Slim\App;
use App\Http\Controller\HomeController;
use Skeleton\ServiceProviderInterface;

/**
 * Class AppServiceProvider
 * @package App
 */
class AppServiceProvider implements ServiceProviderInterface
{
    public function dependencies(): array
    {
        return [];
    }

    public function middleware(App $app): App
    {
        $app->add(Cors::class);

        return $app;
    }

    public function routes(App $app): App
    {
        $app->get('/', HomeController::class);

        return $app;
    }
}
