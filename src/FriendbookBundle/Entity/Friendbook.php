<?php

namespace FriendbookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friendbook
 *
 * @ORM\Table(name="friendbook")
 * @ORM\Entity(repositoryClass="FriendbookBundle\Entity\FriendbookRepository")
 */
class Friendbook
{
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="iduser1", type="string", length=100)
     */
    private $iduser1;

    /**
     * @var string
     *
     * @ORM\Column(name="iduser2", type="string", length=100)
     */
    private $iduser2;

    /**
     * @var string
     *
     * @ORM\Column(name="nomuser2", type="string", length=100)
     */
    private $nomuser2;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomuser2", type="string", length=100)
     */
    private $prenomuser2;

    /**
     * @var string
     *
     * @ORM\Column(name="mailuser2", type="string", length=50)
     */
    private $mailuser2;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set iduser1
     *
     * @param string $iduser1
     * @return Friendbook
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
     * @return Friendbook
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
     * Set nomuser2
     *
     * @param string $nomuser2
     * @return Friendbook
     */
    public function setNomuser2($nomuser2)
    {
        $this->nomuser2 = $nomuser2;

        return $this;
    }

    /**
     * Get nomuser2
     *
     * @return string 
     */
    public function getNomuser2()
    {
        return $this->nomuser2;
    }

    /**
     * Set prenomuser2
     *
     * @param string $prenomuser2
     * @return Friendbook
     */
    public function setPrenomuser2($prenomuser2)
    {
        $this->prenomuser2 = $prenomuser2;

        return $this;
    }

    /**
     * Get prenomuser2
     *
     * @return string 
     */
    public function getPrenomuser2()
    {
        return $this->prenomuser2;
    }

    /**
     * Set mailuser2
     *
     * @param string $mailuser2
     * @return Friendbook
     */
    public function setMailuser2($mailuser2)
    {
        $this->mailuser2 = $mailuser2;

        return $this;
    }

    /**
     * Get mailuser2
     *
     * @return string 
     */
    public function getMailuser2()
    {
        return $this->mailuser2;
    }

    /**
     * Set users
     *
     * @param \UserBundle\Entity\User $users
     * @return Friendbook
     */
    public function setUsers(\UserBundle\Entity\User $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
