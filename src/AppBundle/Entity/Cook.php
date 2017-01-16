<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class      Cook
 * @package   AppBundle\Entity
 * @category  AppBundle
 * @author    Brice VICO <brice.vico@orange.fr>
 * @copyright 2017
 *
 * @ORM\Table(name="cook")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CookRepository")
 */
class Cook
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Category
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category")
     * @ORM\JoinTable(name="cook_category",
     *      joinColumns={@ORM\JoinColumn(name="cook_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     *      )
     */
    private $category;

    /**
     * @var Plan
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Plan", cascade={"remove"})
     * @ORM\JoinColumn(name="plan_id", referencedColumnName="id")
     */
    private $plan;

    /**
     * Cook constructor.
     */
    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Cook
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
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
     * Set name
     *
     * @param string $name
     *
     * @return Cook
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @param Plan $plan
     * @return Cook
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }
}

