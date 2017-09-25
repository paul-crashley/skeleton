<?php

namespace App\Http\Controller;

use Psr\Http\Message\ResponseInterface;

class HomeController
{
    public function __invoke(ResponseInterface $response)
    {
        $response->getBody()->write('Hello.');

        return $response;
    }
}
