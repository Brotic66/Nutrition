<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class      Week
 *
 * @package   AppBundle\Entity
 * @category  AppBundle
 * @author    Brice VICO <brice.vico@orange.fr>
 * @copyright 2017
 *
 * @ORM\Table(name="week")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WeekRepository")
 */
class Week
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Day", mappedBy="week", cascade={"remove", "persist"})
     */
    private $days;

    public function __construct()
    {
        $this->days = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Week
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Week
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param ArrayCollection $days
     * @return Week
     */
    public function setDays($days)
    {
        $this->days = $days;
        return $this;
    }
}

