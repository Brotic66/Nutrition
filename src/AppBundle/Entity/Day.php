<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class      Day
 * @package   AppBundle\Entity
 * @category  AppBundle
 * @author    Brice VICO <brice.vico@orange.fr>
 * @copyright 2017
 *
 * @ORM\Table(name="day")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DayRepository")
 */
class Day
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
     * @var string
     *
     * @ORM\Column(name="day", type="string", length=10)
     */
    private $day;

    /**
     * @var Week
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Week", inversedBy="days")
     * @ORM\JoinColumn(name="week_id", referencedColumnName="id")
     */
    private $week;

    /**
     * @var Cook
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cook")
     * @ORM\JoinTable(name="day_breakfast",
     *      joinColumns={@ORM\JoinColumn(name="day_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="breakfast_id", referencedColumnName="id")}
     *      )
     */
    private $breakfast;

    /**
     * @var Cook
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cook")
     * @ORM\JoinTable(name="day_lunch",
     *      joinColumns={@ORM\JoinColumn(name="day_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="lunch_id", referencedColumnName="id")}
     *      )
     */
    private $lunch;

    /**
     * @var Cook
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cook")
     * @ORM\JoinTable(name="day_snack",
     *      joinColumns={@ORM\JoinColumn(name="day_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="snack_id", referencedColumnName="id")}
     *      )
     */
    private $snack;

    /**
     * @var Cook
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cook")
     * @ORM\JoinTable(name="day_dinner",
     *      joinColumns={@ORM\JoinColumn(name="day_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="dinner_id", referencedColumnName="id")}
     *      )
     */
    private $dinner;


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
     * Set day
     *
     * @param string $day
     *
     * @return Day
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return Week
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * @param Week $week
     * @return Day
     */
    public function setWeek($week)
    {
        $this->week = $week;
        return $this;
    }

    /**
     * @return Cook
     */
    public function getBreakfast()
    {
        return $this->breakfast;
    }

    /**
     * @param Cook $breakfast
     * @return Day
     */
    public function setBreakfast($breakfast)
    {
        $this->breakfast = $breakfast;
        return $this;
    }

    /**
     * @return Cook
     */
    public function getLunch()
    {
        return $this->lunch;
    }

    /**
     * @param Cook $lunch
     * @return Day
     */
    public function setLunch($lunch)
    {
        $this->lunch = $lunch;
        return $this;
    }

    /**
     * @return Cook
     */
    public function getDinner()
    {
        return $this->dinner;
    }

    /**
     * @param Cook $dinner
     * @return Day
     */
    public function setDinner($dinner)
    {
        $this->dinner = $dinner;
        return $this;
    }

    /**
     * @return Cook
     */
    public function getSnack()
    {
        return $this->snack;
    }

    /**
     * @param Cook $snack
     * @return Day
     */
    public function setSnack($snack)
    {
        $this->snack = $snack;
        return $this;
    }

}

