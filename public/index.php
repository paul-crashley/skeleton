<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require __DIR__ .'/../vendor/autoload.php';

$app = new \DI\Bridge\Slim\App;

$app->get('/', function (ResponseInterface $response, ServerRequestInterface $request) {
    $response->getBody()->write('Hello.');
    return $response;
});

$app->run();
