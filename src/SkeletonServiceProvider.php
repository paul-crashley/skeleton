<?php

namespace Skeleton;

use DI\Bridge\Slim\App;
use Monolog\Logger;

/**
 * This service provider will run first, so add any global dependencies that may be required in other service providers
 * in the chain here.
 *
 * This provider also contains your home page route which can be changed to fit your project.
 *
 * Class SkeletonServiceProvider
 * @package Skeleton
 */
class SkeletonServiceProvider implements ServiceProviderInterface
{
    public function dependencies(): array
    {
        return [
            'settings.displayErrorDetails' => \Skeleton\debug(),
            'settings.debug' => \Skeleton\env('APP_DEBUG'),
            'settings.environment' => \Skeleton\env('APP_ENV'),

            'logger' => [
                'name' => \Skeleton\env('APP_NAME', 'skeleton'),
                'level' => Logger::DEBUG,
                'path' => __DIR__ . '/../logs/app.log',
            ],
        ];
    }

    public function routes(App $app): App
    {
        return $app;
    }
}
