<?php

namespace App;

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

    public function routes(App $app): App
    {
        $app->get('/', HomeController::class);

        return $app;
    }
}
