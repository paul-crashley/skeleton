<?php

namespace Skeleton\Auth;

use Brash\Data\DataManager;
use Skeleton\Auth\Jwt\JwtValue;
use Slim\Http\Request;
use Slim\Http\Response;
use Skeleton\Auth\Entity\Auth;
use Skeleton\Auth\Jwt\Manager as JwtManager;

class AuthController
{
    /** @var DataManager  */
    private $repository;
    /**
     * @var JwtManager
     */
    private $jwtManager;

    /**
     * Auth constructor.
     *
     * @param DataManager $repository
     * @param JwtManager  $jwtManager
     */
    public function __construct(DataManager $repository, JwtManager $jwtManager)
    {
        $this->repository = $repository;
        $this->jwtManager = $jwtManager;
    }

    public function __invoke(Request $request, Response $response)
    {
        $email = $request->getParam('email');
        $password = $request->getParam('password');
        $remember = $request->getParam('remember');

        $user = $this->repository->findOneBy(Auth::class, [
            'email' => $email
        ]);

        if (!$user instanceof Auth || !password_verify($password, $user->getPassword())) {
            throw new \HttpRequestException("Incorrect user credentials", 401);
        }

        $jwt = new JwtValue(\Skeleton\env('APP_URL'));

        if ($remember) {
            $jwt->setRemembered();
        }

        $token = $this->jwtManager->create($jwt);

        return $response->withJson(['token' => $token]);
    }
}
