<?php

namespace Skeleton\Auth\Transformer;

use Skeleton\Auth\Entity\Auth;

interface AuthTransformerInterface
{
    /**
     * @param Auth $entity
     *
     * @return array
     */
    public function transform(Auth $entity): array;
}
