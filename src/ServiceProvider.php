<?php

namespace Brash\Skeleton;

use DI\Bridge\Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function dependencies(App $app): App
    {
        return $app;
    }

    public function routes(App $app): App
    {
        $app->get('/', function (ResponseInterface $response, ServerRequestInterface $request) {
            $response->getBody()->write('Hello.');
            return $response;
        });

        return $app;
    }
}
