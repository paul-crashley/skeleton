<?php

namespace Skeleton\Auth\Entity;

use Brash\Data\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Permission
 * @package Skeleton\Auth\Entity
 * @ORM\Entity
 * @ORM\Table(name="permission")
 */
class Permission extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $permission;

    /**
     * @return string
     */
    public function getPermission(): string
    {
        return $this->permission;
    }

    /**
     * @param string $permission
     *
     * @return $this
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;

        return $this;
    }
}
