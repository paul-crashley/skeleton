<?php

namespace Skeleton\Auth\Entity;

use Brash\Data\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="role")
 */
class Role extends AbstractEntity
{
    /**
     * @var Permission[]|ArrayCollection
     * @ORM\OneToMany(
     *     targetEntity="Permission",
     *     mappedBy="role"
     * )
     */
    protected $permissions;

    /**
     * @return ArrayCollection|Permission[]
     */
    public function getPermissions():? ArrayCollection
    {
        return $this->permissions;
    }

    /**
     * @param ArrayCollection $permissions
     *
     * @return $this
     */
    public function setPermissions(ArrayCollection $permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    public function hasPermission(string $value):  bool
    {
        foreach ($this->getPermissions() as $permission) {
            if ($permission->getPermission() == $value) {
                return true;
            }
        }
        return false;
    }
}
