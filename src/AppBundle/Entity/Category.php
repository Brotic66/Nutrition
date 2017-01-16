<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class      Category
 * @package   AppBundle\Entity
 * @category  AppBundle
 * @author    Brice VICO <brice.vico@orange.fr>
 * @copyright 2017
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var string Breakfast BDD translation.
     */
    const BREAKFAST = 'Petit-déjeuné';

    /**
     * @var string Lunch BDD translation.
     */
    const LUNCH = 'Déjeuné';

    /**
     * @var string Snack BDD translation.
     */
    const SNACK = 'En-cas';

    /**
     * @var string Dinner BDD translation.
     */
    const DINNER = 'Diner';

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
     * @return Category
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
}

