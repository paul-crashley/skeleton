<?php

namespace Skeleton\Auth\Jwt;

use Firebase\JWT\JWT;

class Manager
{
    /** @var string */
    private $secret;

    /** @var array  */
    private $algorithm = 'HS256';

    /**
     * JwtManager constructor.
     *
     * @param string $secret
     */
    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    public function create(JwtValue $jwtValue): string
    {
        return JWT::encode($jwtValue->toArray(), $this->secret);
    }

    public function parse(string $token): array
    {
        return (array) JWT::decode($token, $this->secret, [$this->algorithm]);
    }

    public function identitity(string $token):? int
    {
        $payload = $this->parse($token);

        return (isset($payload['data']->identifier)) ? $payload['data']->identifier : null;
    }
}
