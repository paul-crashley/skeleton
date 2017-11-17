<?php

namespace Skeleton\Auth;

use Skeleton\Auth\Transformer\AuthTransformerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use League\Fractal\Manager as Fractal;

class CurrentUser
{
    /** @var  Fractal */
    private $fractal;

    /**
     * @var AuthTransformerInterface
     */
    private $authTransformer;

    /**
     * CurrentUser constructor.
     *
     * @param Fractal                  $fractal
     * @param AuthTransformerInterface $authTransformer
     */
    public function __construct(Fractal $fractal, AuthTransformerInterface $authTransformer)
    {
        $this->fractal = $fractal;
        $this->authTransformer = $authTransformer;
    }

    public function __invoke(Request $request, Response $response)
    {
        $user = $request->getAttribute('user', null);
        $data = $this->authTransformer->transform($user);

        return $response->withJson($data);
    }
}
