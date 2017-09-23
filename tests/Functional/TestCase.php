<?php

namespace Skeleton\Tests\Functional;

use PHPUnit\Framework\TestCase as PhpUnit;
use Skeleton\Bootstrap;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;

class TestCase extends PhpUnit
{
    protected function runApp(string $requestMethod, string $uri, array $requestData = [])
    {
        $environment = Environment::mock([
            'REQUEST_METHOD' => $requestMethod,
            'REQUEST_URI' => $uri
        ]);

        $request = Request::createFromEnvironment($environment);

        if (!empty($requestData)) {
            $request = $request->withParsedBody($requestData);
        }

        $response = new Response();

        $app = Bootstrap::getApp();

        $response = $app->process($request, $response);

        return $response;
    }
}
