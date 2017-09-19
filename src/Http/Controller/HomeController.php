<?php

namespace Skeleton\Http\Controller;

use Psr\Http\Message\ResponseInterface;

class HomeController
{
    public function index(ResponseInterface $response)
    {
        $response->getBody()->write('Hello.');

        return $response;
    }
}
