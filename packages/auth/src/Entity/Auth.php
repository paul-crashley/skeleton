<?php

namespace Skeleton\Auth\Entity;

use Brash\Data\AbstractSoftDeleteEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="auth")
 */
class Auth extends AbstractSoftDeleteEntity
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     * /**
     * @ORM\ManyToMany(targetEntity="Role" cascade={"persist"})
     * @ORM\JoinTable(name="auth_role",
     *        joinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")},
     *        inverseJoinColumns={@ORM\JoinColumn(name="auth_id", referencedColumnName="id")}
     *    )
     * @var Role[]|\Doctrine\Common\Collections\ArrayCollection
     */
    protected $roles;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }
}
