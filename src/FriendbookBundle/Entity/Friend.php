<?php

namespace FriendbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friend
 *
 * @ORM\Table(name="friend")
 * @ORM\Entity(repositoryClass="FriendbookBundle\Entity\FriendRepository")
 */
class Friend
{
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="iduser1", type="string", length=100)
     * @ORM\Id
     *
     */
    private $iduser1;//@ORM\Column(name="iduser1", type="string", length=100,unique=true)
    /**
     * @var string
     *
     * @ORM\Column(name="iduser2", type="string", length=100)
     * @ORM\Id
     *
     */
    private $iduser2;//@ORM\Column(name="iduser2", type="string", length=100,unique=true)

    /**
     * Set iduser1
     *
     * @param string $iduser1
     * @return Friend
     */
    public function setIduser1($iduser1)
    {
        $this->iduser1 = $iduser1;

        return $this;
    }

    /**
     * Get iduser1
     *
     * @return string 
     */
    public function getIduser1()
    {
        return $this->iduser1;
    }

    /**
     * Set iduser2
     *
     * @param string $iduser2
     * @return Friend
     */
    public function setIduser2($iduser2)
    {
        $this->iduser2 = $iduser2;

        return $this;
    }

    /**
     * Get iduser2
     *
     * @return string 
     */
    public function getIduser2()
    {
        return $this->iduser2;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Friend
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
