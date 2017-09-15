<?php

namespace Brash\Skeleton;

use DI\Bridge\Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * This service provider will run first, so add any global dependencies that may be required in other service providers
 * in the chain here.
 *
 * Class ServiceProvider
 * @package Brash\Skeleton
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function dependencies(App $app): App
    {
        return $app;
    }

    public function routes(App $app): App
    {
        $app->get('/', function (ResponseInterface $response, ServerRequestInterface $request) {
            phpinfo(); exit;
            $response->getBody()->write('Hello.');
            return $response;
        });

        return $app;
    }
}
