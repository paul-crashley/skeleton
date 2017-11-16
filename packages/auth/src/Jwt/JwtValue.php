<?php

namespace Skeleton\Auth\Jwt;

class JwtValue
{
    /** @var  int */
    private $issuedAt;

    /** @var  string */
    private $jti;

    /** @var string */
    private $issuer;

    /** @var int */
    private $notBefore;

    /** @var int */
    private $expire;

    /** @var array */
    private $data = [];

    /** @var array  */
    private $reservedDataKeys = [
        'remembered',
        'identifier',
    ];

    public function __construct(string $issuer, int $ttl = 3600)
    {
        $this->setIssuedAt(time());
        $this->setJti(base64_encode(random_bytes(32)));
        $this->setIssuer($issuer);
        $this->setNotBefore($this->getIssuedAt());
        $this->setExpire($this->getIssuedAt()+$ttl);
    }

    /**
     * @return int
     */
    public function getIssuedAt(): int
    {
        return $this->issuedAt;
    }

    /**
     * @param int $issuedAt
     *
     * @return JwtValue
     */
    private function setIssuedAt(int $issuedAt): JwtValue
    {
        $this->issuedAt = $issuedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getJti(): string
    {
        return $this->jti;
    }

    /**
     * @param string $jti
     *
     * @return JwtValue
     */
    private function setJti(string $jti): JwtValue
    {
        $this->jti = $jti;

        return $this;
    }

    /**
     * @return string
     */
    public function getIssuer(): string
    {
        return $this->issuer;
    }

    /**
     * @param string $issuer
     *
     * @return JwtValue
     */
    private function setIssuer(string $issuer): JwtValue
    {
        $this->issuer = $issuer;

        return $this;
    }

    /**
     * @return int
     */
    public function getNotBefore(): int
    {
        return $this->notBefore;
    }

    /**
     * @param int $notBefore
     *
     * @return JwtValue
     */
    private function setNotBefore(int $notBefore): JwtValue
    {
        $this->notBefore = $notBefore;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpire(): int
    {
        return $this->expire;
    }

    /**
     * @param int $expire
     *
     * @return JwtValue
     */
    private function setExpire(int $expire): JwtValue
    {
        if ($expire <= $this->getNotBefore()) {
            throw new \InvalidArgumentException("Expiry must be in the future");
        }

        $this->expire = $expire;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return JwtValue
     */
    public function setData(array $data): JwtValue
    {
        foreach ($data as $key => $value) {
            $this->addData($key, $value);
        }

        return $this;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return JwtValue
     */
    public function addData($key, $value): JwtValue
    {
        if (in_array($key, $this->reservedDataKeys)) {
            throw new \InvalidArgumentException(sprintf("Key '%s' is a reserved data key", $key));
        }

        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param int $ttl
     *
     * @return JwtValue
     */
    public function setRemembered($ttl = 86400): JwtValue
    {
        if (!is_int($ttl)) {
            throw new \InvalidArgumentException("JWT TTL must be an integer");
        }

        $this->setExpire($this->getIssuedAt()+$ttl);
        $this->data['remembered'] = true;

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setIdentifier($value)
    {
        if (!is_int($value) && !is_string($value)) {
            throw new \InvalidArgumentException("JWT Identifier must be an integer or a string");
        }

        $this->data['identifier'] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'iat'  => $this->getIssuedAt(),
            'jti'  => $this->getJti(),
            'iss'  => $this->getIssuer(),
            'nbf'  => $this->getNotBefore(),
            'exp'  => $this->getExpire(),
            'data' => $this->getData(),
        ];
    }
}